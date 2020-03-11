<template>
  <nav id="navbar" class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <router-link class="navbar-item has-text-weight-bold" to="/">Lan Xang Digital</router-link>

      <a
        role="button"
        class="navbar-burger burger"
        aria-label="menu"
        aria-expanded="false"
        data-target="navbar-menu"
      >
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbar-menu" class="navbar-menu">
      <div class="navbar-start">
        <div class="navbar-item has-dropdown is-hoverable">
          <router-link to="/products" class="navbar-link">ສິນຄ້າ</router-link>
          <div class="navbar-dropdown">
            <router-link to="/products/computer" class="navbar-item">ຄອມພິວເຕີ</router-link>
            <router-link to="/products/smartphone" class="navbar-item">ສມາທໂຟນ</router-link>
            <router-link to="/products/camera" class="navbar-item">ກ້ອງດິຈິຕອລ</router-link>
          </div>
        </div>
        <router-link to="/about" class="navbar-item">ກ່ຽວກັບ</router-link>
        <router-link to="/contact" class="navbar-item">ຕິດຕໍ່</router-link>
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            <router-link to="/cart" class="button is-info">
              <span class="icon">
                <i class="fas fa-cart-plus"></i>
              </span>
              <span>ກະຕ່າ</span>
            </router-link>
            <router-link to="/register" v-if="!isLogged" class="button is-info">ລົງທະບຽນ</router-link>
            <router-link to="/login" v-if="!isLogged" class="button is-light">ລົງຊື່ເຂົ້າໃຊ້</router-link>
            <router-link
              :to="{ name: role == 1 ? 'admin-home' : 'user-home', params: {username: username} }"
              v-if="isLogged"
              class="button is-info"
            >
              <span class="icon">
                <i class="fas fa-user"></i>
              </span>
              <span>{{username}}</span>
            </router-link>
            <button @click="logout()" v-if="isLogged" class="button is-light">
              <span class="icon">
                <i class="fas fa-sign-out-alt"></i>
              </span>
              <span>ອອກຈາກລະບົບ</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>
<script>
export default {
  data() {
    return {
      username: this.getUsername(),
      role: this.getRole(),
      isLogged: this.checkIfLogged()
    };
  },
  created() {
    this.$bus.$on("logged", () => {
      this.isLogged = this.checkIfLogged();
      this.username = this.getUsername();
      this.role = this.getRole();
    });
  },
  methods: {
    checkIfLogged() {
      const username = localStorage.getItem("username");
      return username ? true : false;
    },
    getUsername() {
      return localStorage.getItem("username");
    },
    getRole() {
      return localStorage.getItem("user_role");
    },
    logout() {
      localStorage.removeItem("username");
      localStorage.removeItem("user_id");
      localStorage.removeItem("user_role");
      this.isLogged = this.checkIfLogged();
      //   this.$forceUpdate();
      this.$router.push("/");
    }
  }
};
</script>
