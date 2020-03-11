<template>
  <div>
    <Herocomponent :title="title" :subtitle="subtitle" :additionalText="additionalText"></Herocomponent>
    <div class="columns">
      <div class="column is-one-fifth">
        <aside class="menu">
          <p class="menu-label">ລາຍການ</p>
          <ul class="menu-list">
            <li>
              <router-link :to="{ name: 'admin-home', params: {username: getUsername()} }">ໜ້າຫຼັກ</router-link>
            </li>
            <li>
              <router-link
                :to="{ name: 'admin-product-management', params: {username: getUsername()} }"
              >ຈັດການຂໍ້ມູນສິນຄ້າ</router-link>
            </li>
          </ul>
        </aside>
      </div>
      <div class="column">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>
<script>
import Herocomponent from "../components/HeroComponent";

export default {
  data() {
    return {
      username: this.getUsername(),
      title: "ຜູ້ບໍລິຫານລະບົບ",
      subtitle: "ຊື່ຜູ້ໃຊ້: " + this.getUsername(),
      additionalText: "ບໍ່ມີຫຍັງທີ່ສົມບູນແບບໄຮ້ທີ່ຕິ, ເວັບນີ້ກໍເຊັ່ນດຽວກັນ..."
    };
  },
  created() {
    this.username = this.getUsername();
  },
  methods: {
    getUsername() {
      return localStorage.getItem("username");
    }
  },
  components: {
      Herocomponent
  }
};
</script>
