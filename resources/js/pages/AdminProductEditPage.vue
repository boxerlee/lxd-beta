<template>
  <div id="addproduct">
    <h1 class="title">{{ mode == 'create' ? 'ເພີ່ມສິນຄ້າ' : 'ແກ້ໄຂຂໍ້ມູນສິນຄ້າ'}}</h1>
    <router-link :to="{ name: 'admin-product-management'}" class="button is-info">
      <span class="icon">
        <i class="fas fa-arrow-left"></i>
      </span>
      <span>ກັບ</span>
    </router-link>
    <div class="columns">
      <div class="column">
        <section class="section">
          <div class="container">
            <form @submit.prevent>
              <div class="field">
                <label class="label">ຊື່ສິນຄ້າ</label>
                <div class="control">
                  <input v-model="name" type="text" class="input" placeholder="ຊື່ສິນຄ້າ" />
                </div>
              </div>
              <div class="field">
                <label class="label">ຄໍາອະທິບາຍສິນຄ້າ</label>
                <div class="control">
                  <textarea v-model="description" class="textarea" placeholder="ຄໍາອະທິບາຍສິນຄ້າ"></textarea>
                </div>
              </div>
              <div class="field">
                <label class="label">ລາຄາສິນຄ້າ</label>
                <div class="control">
                  <input
                    v-model.number="price"
                    type="number"
                    class="input"
                    placeholder="ລາຄາສິນຄ້າ"
                  />
                </div>
              </div>
              <div class="field">
                <div class="file has-name">
                  <label class="file-label">
                    <input class="file-input" type="file" @change="changeFile" />
                    <span class="file-cta">
                      <span class="file-icon">
                        <i class="fas fa-upload"></i>
                      </span>
                      <span class="file-label">ເລືອກໄຟລ໌ຮູບ…</span>
                    </span>
                    <span class="file-name">{{ file ? fileName : 'ຊື່ຮູບ' }}</span>
                  </label>
                </div>
              </div>
              <figure v-if="file || fileUrl" class="image is-128x128">
                <img :src="fileUrl" />
              </figure>
              <div class="field">
                <label class="label">ຍີ່ຫໍ້ສິນຄ້າ</label>
                <div class="control">
                  <div class="select">
                    <select v-model="brand" id="brand">
                      <option selected disabled value>ເລືອກປະເພດ</option>
                      <option
                        v-for="b of productBrand"
                        :key="b.product_brand_id"
                        :value="b.product_brand_id"
                      >{{ b.product_brand_name }}</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="field">
                <label class="label">ປະເພດສິນຄ້າ</label>
                <div class="control">
                  <div class="select">
                    <select v-model="type" id="type">
                      <option selected disabled value>ເລືອກປະເພດ</option>
                      <option
                        v-for="t of productType"
                        :key="t.product_type_id"
                        :value="t.product_type_id"
                      >{{ t.product_type_name }}</option>
                    </select>
                  </div>
                </div>
              </div>
              <hr />
              <div class="field is-grouped">
                <div class="control">
                  <button
                    :disabled="!name || !description || !price || !brand || !type || !file"
                    v-if="mode == 'create'"
                    @click="addProduct"
                    class="button is-success"
                  >ບັນທຶກ</button>
                </div>
                <div>
                  <button
                    :disabled="!name || !description || !price || !brand || !type || !file"
                    v-if="mode == 'edit'"
                    class="button is-success"
                  >
                    <span class="icon">
                      <i class="fas fa-edit"></i>
                    </span>
                    <span>ບັນທຶກ</span>
                  </button>
                </div>
                <div class="control">
                  <button
                    v-if="mode == 'create'"
                    @click="clearData"
                    class="button is-danger"
                  >ລ້າງຟອມ</button>
                </div>
              </div>
              <p v-if="result" class="has-text-success has-text-weight-bold">ສໍາເລັດ!</p>
              <p v-if="err" class="has-text-danger has-text-weight-bold">ມີຂໍ້ຜິດພາດ!</p>
            </form>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      productType: [],
      productBrand: [],
      name: "",
      description: "",
      price: 0,
      brand: "",
      type: "",
      file: "",
      fileUrl: "",
      fileName: "",
      mode: "create",
      result: false,
      err: false
    };
  },
  created() {
    this.getType();
    this.getBrand();
    this.checkMode();
  },
  methods: {
    checkMode() {
      if (this.$route.params.productId) {
        this.mode = "edit";
        this.getProduct();
      } else {
        this.mode = "create";
      }
    },
    getType() {
      window.axios
        .get("/api/gettype")
        .then(res => {
          this.productType = res.data.type;
        })
        .catch(err => {
          console.error(err);
        });
    },
    getBrand() {
      window.axios
        .get("/api/getbrand")
        .then(res => {
          this.productBrand = res.data.brand;
        })
        .catch(err => {
          console.error(err);
        });
    },
    getProduct() {
      window.axios
        .get("/api/getproduct", {
          params: { id: this.$route.params.productId }
        })
        .then(res => {
          const product = res.data.product;
          console.log(product);
          this.name = product.product_name;
          this.description = product.product_description;
          this.price = product.product_price;
          this.fileUrl = "/storage/" + product.product_image_name;
          this.brand = product.product_brand;
          this.type = product.product_type;
        })
        .catch(err => {
          console.error(err);
        });
    },
    changeFile(e) {
      this.file = e.target.files[0];
      this.fileUrl = URL.createObjectURL(this.file);
      this.fileName = e.target.files[0].name;
      console.log(this.file);
    },
    addProduct() {
      this.result = false;
      if (
        this.name &&
        this.description &&
        this.price &&
        this.brand &&
        this.type &&
        this.file
      ) {
        const product = new FormData();
        product.append("name", this.name);
        product.append("description", this.description);
        product.append("price", this.price);
        product.append("brand", this.brand);
        product.append("type", this.type);
        product.append("file", this.file, this.fileName);
        window.axios
          .post("/api/addproduct", product, {
            headers: { "Content-Type": "multipart/form-data" }
          })
          .then(res => {
            if (res.data.message == "OK") {
              this.result = true;
            }
          })
          .catch(err => {
            this.err = true;
          });
      }
    },
    clearData() {
      this.name = "";
      (this.description = ""),
        (this.price = 0),
        (this.brand = ""),
        (this.type = ""),
        (this.file = "");
    }
  }
};
</script>
