<template>
  <transition name="fade">
    <div class="modal is-active" v-if="show">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">ນໍາເຂົ້າສິນຄ້າ</p>
          <button @click="$emit('close')" class="button">
            <span class="icon">
              <i class="fas fa-times"></i>
            </span>
          </button>
        </header>
        <section class="modal-card-body">
          <p>ສິນຄ້າ: {{name}}</p>
          <div class="field is-horizontal">
            <div class="field-label">
              <label class="label">ຈໍານວນສິນຄ້າ</label>
            </div>
            <div class="field-body">
              <div class="control">
                <input v-model="stock" type="number" class="input" />
              </div>
            </div>
          </div>
        </section>
        <footer class="modal-card-foot">
          <button class="button is-success">ບັນທຶກ</button>
          <button @click="$emit('close')" class="button is-danger">ຍົກເລີກ</button>
        </footer>
      </div>
    </div>
  </transition>
</template>
<script>
export default {
  props: ["show", "id", "name", "currentStock"],
  data() {
    return {
      stock: this.currentStock,
    };
  },
  methods: {
    // getProduct() {
    //   window.axios
    //     .get("/api/getproduct", { params: { id: this.id } })
    //     .then(res => {
    //       this.currentStock = res.data.product.product_stock;
    //       this.stock = res.data.product.product_stock;
    //       this.name = res.data.product.product_name;
    //     })
    //     .catch(err => {
    //       console.error(err);
    //     });
    // }
  }
};
</script>
<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>
