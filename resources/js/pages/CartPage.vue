<template>
  <div>
    <Herocomponent :title="title" :subtitle="subtitle" :additionalText="additionalText"></Herocomponent>
    <ul v-if="$cartItem.length > 0">
      <li v-for="c of $cartItem" :key="c">{{c}}</li>
    </ul>
    <p v-if="$cartItem.length = 0">ບໍ່ມີຫຍັງໃນກະຕ່າ</p>
    <button @click="add" class="button is-primary is-circle">
      <span class="icon">
        <i class="fas fa-plus"></i>
      </span>
    </button>
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
      title: "ກະຕ່າ",
      subtitle: "ສິນຄ້າໃນກະຕ່າຂອງທ່ານ",
      additionalText: "ຍັງໃຊ້ບໍ່ໄດ້ໂວ້ຍ!"
    };
  },
  created() {
      console.log(this.$cartItem);
  },
  methods: {
    add() {
      this.$cartItem.push("MacBook Pro");
      console.log(this.$cartItem)
    }
  }
};
</script>
