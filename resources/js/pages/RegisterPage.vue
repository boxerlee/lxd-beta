<template>
  <div>
    <Herocomponent :title="title"></Herocomponent>
    <div class="columms">
      <div class="column card is-half is-offset-one-quarter">
        <section class="section">
          <div class="container">
            <form @submit.prevent>
              <div class="field">
                <label class="label">ຊື່</label>
                <div class="control">
                  <input v-model="firstName" type="text" class="input" placeholder="ຊື່ຂອງທ່ານ" />
                </div>
              </div>
              <div class="field">
                <label class="label">ນາມສະກຸນ</label>
                <div class="control">
                  <input v-model="lastName" type="text" class="input" placeholder="ນາມສະກຸນຂອງທ່ານ" />
                </div>
              </div>
              <div class="field">
                <label class="label">ເພດ</label>
                <div class="control">
                  <label class="radio">
                    <input v-model="gender" type="radio" name="question" value="Male" />
                    ຊາຍ
                  </label>
                  <label class="radio">
                    <input v-model="gender" type="radio" name="question" value="Female" />
                    ຍິງ
                  </label>
                  <label class="radio">
                    <input v-model="gender" type="radio" name="question" value="N/A" />
                    ບໍ່ລະບຸ
                  </label>
                </div>
              </div>
              <div class="field">
                <label class="label">ຊື່ຜູ້ໃຊ້</label>
                <div class="control">
                  <input
                    v-model="username"
                    type="text"
                    class="input"
                    placeholder="Username ທີ່ຈະໃຊ້ເຂົ້າສູ່ລະບົບ"
                  />
                </div>
                <p v-if="usernameErr" class="help is-danger">{{usernameErr}}</p>
              </div>
              <div class="field">
                <label class="label">ອີເມວ</label>
                <div class="control">
                  <input v-model="email" type="email" class="input" placeholder="ເມວຂອງທ່ານ" />
                </div>
                <p v-if="emailErr" class="help is-danger">{{emailErr}}</p>
              </div>
              <div class="field">
                <label class="label">ລະຫັດຜ່ານ</label>
                <div class="control">
                  <input
                    v-model="password"
                    type="password"
                    class="input"
                    placeholder="Password ທີ່ຈະໃຊ້ເຂົ້າສູ່ລະບົບ"
                  />
                </div>
              </div>
              <div class="field">
                <label class="label">ຢືນຢັນລະຫັດຜ່ານ</label>
                <div class="control">
                  <input
                    v-model="confirmPassword"
                    type="password"
                    class="input"
                    placeholder="ຢືນຢັນ Password ທີ່ຈະໃຊ້ເຂົ້າສູ່ລະບົບ"
                  />
                  <p v-if="passwordErr" class="help is-danger">{{passwordErr}}</p>
                </div>
              </div>
              <div class="field is-grouped">
                <div class="control">
                  <button
                    :disabled="!firstName || !lastName || !gender || !email || !username || !password || !confirmPassword"
                    @click="register"
                    class="button is-success"
                  >ລົງທະບຽນ</button>
                </div>
                <div class="control">
                  <button type="reset" class="button is-danger">ລ້າງຟອມ</button>
                </div>
              </div>
            </form>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>
<script>
import Herocomponent from "../components/HeroComponent";

export default {
  components: {
    Herocomponent
  },
  data() {
    return {
      title: "ລົງທະບຽນເປັນສະມາຊິກ",
      firstName: "",
      lastName: "",
      email: "",
      gender: "",
      username: "",
      password: "",
      confirmPassword: "",
      emailErr: "",
      usernameErr: "",
      passwordErr: ""
    };
  },
  methods: {
    validateEmail(email) {
      const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return regex.test(email);
    },
    register() {
      this.emailErr = "";
      this.usernameErr = "";
      this.passwordErr = "";
      if (!this.validateEmail(this.email)) {
        this.emailErr = "ກະລຸນາໃຊ້ທີ່ຢູ່ອີເມວທີ່ຖືກຕ້ອງ";
        return;
      }
      if (this.password !== this.confirmPassword) {
        this.passwordErr = "ລະຫັດຜ່ານບໍ່ກົງກັນ";
        return;
      }
      window.axios
        .get("/api/getuserbyusername", {
          params: { username: this.username, check: true }
        })
        .then(res => {
          if (res.data.message == "OK") {
            this.usernameErr = "ຊື່ນີ້ແມ່ນຄົນໃຊ້ແລ້ວ";
          } else {
            window.axios
              .get("/api/getuserbyemail", {
                params: { email: this.email, check: true }
              })
              .then(res => {
                if (res.data.message == "OK") {
                  this.emailErr = "ທີ່ຢູ່ອີເມວນີ້ມີຄົນໃຊ້ແລ້ວ";
                } else {
                  window.axios
                    .post("/api/register", {
                      firstName: this.firstName,
                      lastName: this.lastName,
                      email: this.email,
                      gender: this.gender,
                      username: this.username,
                      password: this.password
                    })
                    .then(res => {
                      if (res.data.message == "OK") {
                        this.$router.push({ name: "login" });
                      }
                    })
                    .catch(err => {
                      console.error(err);
                    });
                }
              });
          }
        });
    }
  }
};
</script>
