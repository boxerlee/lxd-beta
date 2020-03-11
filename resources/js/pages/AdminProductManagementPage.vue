<template>
  <div>
    <h1 class="title">ການຈັດການຂໍ້ມູນສິນຄ້າ</h1>
    <div class="field">
      <div class="control">
        <router-link :to="{ name: 'admin-add-product' }" class="button is-info">
          <span class="icon">
            <i class="fas fa-plus"></i>
          </span>
          <span>ເພິ່ມສິນຄ້າ</span>
        </router-link>
      </div>
      <!-- <div class="control">
        <router-link :to="{ name: 'admin-stock-product' }" class="button is-success">
          <span class="icon">
            <i class="fas fa-plus"></i>
          </span>
          <span>ນໍາເຂົ້າສິນຄ້າ</span>
        </router-link>
      </div>-->
      <hr />
      <div v-if="productsData.length > 0" class="table-container">
        <table class="table is-bordered is-striped is-fullwidth">
          <thead>
            <tr>
              <th>ລໍາດັບ</th>
              <th>ຊື່ສິນຄ້າ</th>
              <th>ຄໍາອະທິບາຍ</th>
              <th>ລາຄາສິນຄ້າ</th>
              <th>ຮູບສິນຄ້າ</th>
              <th>ຍີ່ຫໍ້</th>
              <th>ປະເພດສິນຄ້າ</th>
              <th>ຈໍານວນສິນຄ້າໃນຄັງ</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(p, i) of productsData" :key="p.product_id">
              <td>{{i + 1}}</td>
              <td>{{p.product_name}}</td>
              <td>{{p.product_description}}</td>
              <td>{{p.product_price | currency}}</td>
              <td>
                <figure class="image is-128x128">
                  <img :src="'/storage/'+ p.product_image_name" :alt="p.product_name" />
                </figure>
              </td>
              <td>{{p.product_brand_name}}</td>
              <td>{{p.product_type_name}}</td>
              <td>{{p.product_stock}}</td>
              <td>
                <router-link
                  :to="{ name: 'admin-edit-product', params: {productId: p.product_id}}"
                  class="button is-info"
                >
                  <span class="icon">
                    <i class="fas fa-edit"></i>
                  </span>
                  <span>ແກ້ໄຂ</span>
                </router-link>
                <p>&nbsp;</p>
                <button @click="addStock(p.product_id, p.product_name, p.product_stock)" class="button is-primary">
                  <span class="icon">
                    <i class="fas fa-plus"></i>
                  </span>
                  <span>ນໍາເຂົ້າສິນຄ້າ</span>
                </button>
                <p>&nbsp;</p>
                <button class="button is-danger">
                  <span class="icon">
                    <i class="fas fa-trash"></i>
                  </span>
                  <span>ລົບສິນຄ້າ</span>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <AddStockModal :show="showModal" :id="addStockId" :name="addStockName" :currentStock="currentStock" @close="showModal = false"></AddStockModal>
      <p
        v-if="!productsData.length > 0"
        class="has-text-danger has-text-weight-bold"
      >ຍັງບໍ່ມີສິນຄ້າ...</p>
    </div>
  </div>
</template>
<script>
import AddStockModal from "../components/AddStockModalComponent";

export default {
  components: {
    AddStockModal
  },
  data() {
    return {
      productsData: [],
      showModal: false,
      modalTitle: "ນໍາເຂົ້າສິນຄ້າ",
      addStockId: 0,
      addStockName: "",
      currentStock: 0
    };
  },
  created() {
    this.getProducts();
  },
  methods: {
    getProducts() {
      window.axios
        .get("/api/getproducts")
        .then(res => {
          this.productsData = res.data.products;
        })
        .catch(err => {
          console.error(err);
        });
    },
    addStock(id, name, currentStock) {
      this.showModal = true;
      this.addStockId = id;
      this.addStockName = name;
      this.currentStock = currentStock;
    }
  }
};
</script>
