<template>
  <div>
    <Herocomponent :title="title"></Herocomponent>
    <div class="columns">
      <div class="column card is-half is-offset-one-quarter">
        <section class="section">
          <div class="container">
            <form @submit.prevent>
              <div class="field">
                <label class="label">ຊື່ຜູ້ໃຊ້</label>
                <div class="control">
                  <input
                    v-model="username"
                    type="text"
                    class="input"
                    placeholder="Username ຂອງທ່ານ"
                  />
                </div>
              </div>
              <div class="field">
                <label class="label">ລະຫັດຜ່ານ</label>
                <div class="control">
                  <input
                    v-model="password"
                    type="password"
                    class="input"
                    placeholder="Password ຂອງທ່ານ"
                  />
                </div>
              </div>
              <div class="field is-grouped">
                <div class="control">
                  <button @click.prevent="getAuth()" class="button is-success">ເຂົ້າໃຊ້</button>
                </div>
                <div class="control">
                  <button class="button is-danger">ລືມລະຫັດຜ່ານ?</button>
                </div>
              </div>
              <p v-if="loginErr" class="help is-danger">{{loginErr}}</p>
            </form>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>
<script>
import Herocomponent from "../components/HeroComponent"

export default {
  data: () => {
    return {
      title: "ເຂົ້າສູ່ລະບົບ",
      username: "",
      password: "",
      loginErr: ""
    };
  },
  methods: {
    getAuth() {
      window.axios
        .post("/api/getauth", {
          username: this.username,
          password: this.password
        })
        .then(res => {
          if (res.data.message == "Authenticated") {
            const userInfo = res.data.user[0];
            localStorage.setItem("username", userInfo.username);
            localStorage.setItem("user_id", userInfo.user_id);
            localStorage.setItem("user_role", userInfo.user_type);
            if (parseInt(localStorage.getItem("user_role")) == 1) {
              this.$router.push({
                name: "admin-home",
                params: { username: localStorage.getItem("username") }
              });
            } else {
              this.$router.push({
                name: "user-home",
                params: { username: localStorage.getItem("username") }
              });
            }
            this.$bus.$emit("logged", "Logged in");
            // this.$forceUpdate();
          }
        })
        .catch(err => {
          this.loginErr = "ຊື່ຜູ້ໃຊ້ ຫຼື ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ";
          console.log(err);
        });
    }
  },
  components: {
      Herocomponent
  }
};
</script>
