<template>
  <div>
    <Herocomponent :title="title" :subtitle="subtitle" :additionalText="additionalText"></Herocomponent>
    <div class="columns">
      <div class="column is-one-fifth">
        <aside class="menu">
          <p class="menu-label">ລາຍການ</p>
          <ul class="menu-list">
            <li>
              <router-link :to="{ name: 'user-home', params: {username: getUsername()} }">ໜ້າຫຼັກ</router-link>
            </li>
            <li>
              <router-link
                :to="{ name: 'user-purchase-history', params: {username: getUsername()} }"
              >ປະຫວັດການສັ່ງຊື້ສິນຄ້າ</router-link>
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
  components: {
    Herocomponent
  },
  data() {
    return {
      username: this.getUsername(),
      title: "ສະມາຊິກ",
      subtitle: "ຊື່ຜູ້ໃຊ້: " + this.getUsername(),
      additionalText: "ເຮັດບໍ່ແລ້ວງ່າຍໆດອກ"
    };
  },
  created() {
    this.username = this.getUsername();
  },
  methods: {
    getUsername() {
      return localStorage.getItem("username");
    }
  }
};
</script>
