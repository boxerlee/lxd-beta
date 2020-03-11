<template>
  <div>
    <Herocomponent :title="title"></Herocomponent>
    <!-- <ul>
      <li v-for="p of products" :key="p.product_id">{{p.product_name}}</li>
    </ul>-->
    <div class="columns is-multiline">
      <div class="column is-one-third" v-for="p of products" :key="p.product_id">
        <div class="card">
          <div class="card-image">
            <figure class="image is-square">
              <img :src="'/storage/' + p.product_image_name" :alt="p.product_name" />
            </figure>
          </div>
          <div class="card-header">
            <h1 class="card-header-title">{{p.product_name}}</h1>
          </div>
          <div class="card-content">
            <p>
              <strong>ລາຄາ: {{p.product_price | currency}}</strong>
            </p>
            <p><strong>ຄໍາອະທິບາຍສິນຄ້າ</strong></p>
            <p>{{p.product_description}}</p>
          </div>
          <div class="card-footer">
            <button
              :disabled="p.product_stock <= 0"
              :class="p.product_stock > 0 ? 'is-primary' : 'is-danger'"
              class="button is-fullwidth"
            >
              <span class="icon">
                <i :class="p.product_stock > 0 ? 'fas fa-cart' : 'fas fa-ban'"></i>
              </span>
              <span>{{ p.product_stock > 0 ? 'ໃສ່ກະຕ່າ' : 'ສິນຄ້າໝົດ' }}</span>
            </button>
            <router-link
              :to="{ name: 'product', params: {id: p.product_id}}"
              class="button is-fullwidth is-info"
            >
              <span class="icon">
                <i class="fas fa-info"></i>
              </span>
              <span>ລາຍລະອຽດ</span>
            </router-link>
          </div>
        </div>
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
      title: this.getTitle(),
      products: []
    };
  },
  created() {
    this.getProductsByType(this.$route.params.type);
  },
  beforeRouteUpdate(to, from, next) {
    this.title = this.updateTitle(to.params.type);
    this.getProductsByType(to.params.type);
    next();
  },
  methods: {
    getTitle() {
      return this.$route.params.type == "computer"
        ? "ສິນຄ້າປະເພດຄອມພິວເຕີ"
        : this.$route.params.type == "smartphone"
        ? "ສິນຄ້າປະເພດສມາທໂຟນ"
        : this.$route.params.type == "camera"
        ? "ສິນຄ້າປະເພດກ້ອງດິຈິຕອລ"
        : "ສິນຄ້າທັງໝົດ";
    },
    updateTitle(type) {
      return type == "computer"
        ? "ສິນຄ້າປະເພດຄອມພິວເຕີ"
        : type == "smartphone"
        ? "ສິນຄ້າປະເພດສມາທໂຟນ"
        : type == "camera"
        ? "ສິນຄ້າປະເພດກ້ອງດິຈິຕອລ"
        : "ສິນຄ້າທັງໝົດ";
    },
    getProductsByType(type) {
      if (type) {
        window.axios
          .get("/api/getproductsbytype", {
            params: { type: type }
          })
          .then(res => {
            this.products = res.data.products;
          })
          .catch(err => {
            console.log(err);
          });
      } else {
        window.axios
          .get("/api/getproducts")
          .then(res => {
            this.products = res.data.products;
          })
          .catch(err => {
            console.log(err);
          });
      }
    }
  }
};
</script>
<style scoped>
.card {
  height: 100%;
  display: flex;
  flex-direction: column;
}
.card-footer {
  margin-top: auto;
}
</style>
