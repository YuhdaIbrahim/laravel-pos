<template>
    <div class="container-fluid main-wrapper">
        <div class="row main-content">
            <div class="col-lg-8">
                <div class="upper-section">
                    <NavigationIndex></NavigationIndex>
                    <ProductTab :add-order="addOrder" :data-product="dataProduct"></ProductTab>
                </div>
                <div class="bottom-section">
<!--                    <FilterDropdown></FilterDropdown>-->
                    <CategoryList :change-cat="changeCat" :data-category="dataCategory"></CategoryList>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="checkout">
                    <div class="header">
                        <h2>Order</h2>
                        <div class="line"></div>
                    </div>
                    <div class="body">
                        <ItemCheckout :remove-item="removeItem" :plusQty="plusQty" :minQty="minQty" :dataOrder="dataOrder"></ItemCheckout>
                        <div class="discount">
                            <div class="label">
                                Discount
                            </div>
                            <div class="coupon">
                                <input :class="[{'error_field': error_field}]" v-model="code_discount" type="text" class="input-text">
                                <div class="apply">
                                    <button @click="getDiscount">{{ textDiscount }}</button>
                                    <transition name="fade">
                                        <div v-if="discount > 0 && discount_error === ''" class="text-discount">discount {{ discount }}%</div>
                                    </transition>
                                    <transition name="fade">
                                        <div v-if="discount_error !== ''" class="text-discount error">{{ discount_error }}</div>
                                    </transition>
                                </div>
                            </div>
                        </div>
                        <div class="footer-checkout">
                            <div class="total">
                                <p class="label-price">Total</p>
                                <div class="price">
                                    <div class="pay-price">${{ countTotalDiscount }}</div>
                                    <div v-if="discount > 0" class="price-wrapper">
                                        <div class="price-slash"></div>
                                        <div class="pay-discount">${{ countTotal }}</div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div @click="submitOrder" :class="[{'disable': this.dataOrder.length < 1}]" class="btn-pay">
                        <div class="text">pay</div>
                        <div class="price">${{ countTotalDiscount }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import NavigationIndex from "../components/home/NavigationIndex";
    import ProductTab from "../components/home/ProductTab";
    import FilterDropdown from "../components/home/FilterDropdown";
    import CategoryList from "../components/home/CategoryList";
    import ItemCheckout from "../components/home/ItemCheckout";
    export default {
        name: "Home",
        data() {
            return {
                dataCategory: [],
                dataProduct: [],
                dataOrder: [],
                loading: false,
                discount: 0,
                code_discount: '',
                discount_error: '',
                discount_active: false,
                error_field: false,
            }
        },
        components: {
            ItemCheckout,
            NavigationIndex,
            ProductTab,
            FilterDropdown,
            CategoryList,
        },
        created() {
            this.getAllProduct();
        },
        methods: {
          addOrder(product) {
              if(this.productCheck(this.dataOrder, product)){
                  this.plusQty(product.id)
              } else {
                  product['qty'] = 1;
                  return this.dataOrder.splice(this.dataOrder.length, 0 , product)
              }
          },
          productCheck(myArray, el) {
               for (let i=0; i < myArray.length; i++) {
                   if (myArray[i].id === el.id) {
                        return true;
                   }
               }
          },
          plusQty(id){
              let newObj  = this.dataOrder.find(el => el.id === id ? Vue.set(el, 'qty',el.qty = el.qty + 1)  : '') ;
              let findIndex = this.dataOrder.findIndex(obj => obj.id === newObj.id);
              this.dataOrder = this.dataOrder.filter(function( obj ) {
                  return obj.id !== id;
              });
              this.dataOrder.splice(findIndex, 0, newObj);
          },
          minQty(id){
              let newObj  = this.dataOrder.find(el => el.id === id && el.id === id);
              if(newObj.qty === 1) {
                  this.removeItem(id);
              } else {
                  Vue.set(newObj, 'qty', newObj.qty = newObj.qty - 1 );
                  let findIndex = this.dataOrder.findIndex(obj => obj.id === newObj.id);
                  this.dataOrder = this.dataOrder.filter(function( obj ) {
                      return obj.id !== id;
                  });
                  this.dataOrder.splice(findIndex, 0, newObj);
              }

          },
          removeItem(id){
              this.dataOrder = this.dataOrder.filter(function( obj ) {
                  return obj.id !== id;
              });
              if(this.dataOrder.length < 1){
                  this.discount = 0;
                  this.discount_active = false;
                  this.code_discount = '';
              }

          },
          getDiscount(){
              this.loading = true;
              this.discount_error = '';
              this.error_field = false;

              if(this.code_discount === ''){
                  return [
                      this.discount_error = 'Input code first!',
                      this.error_field = true,
                  ];
              }
              if(this.dataOrder.length > 0 && !this.discount_active){
                  axios.get(`/api/get-discount/${this.code_discount}`)
                      .then(res => {
                          this.discount = res.data.data.discount;
                          this.discount_active = true;
                      })
                      .catch(e => {
                          this.discount_error = e.response.data.error;
                          console.log(e.response);
                      })
                      .finally(() => this.loading = false);
              } else if (this.discount_active && this.dataOrder.length > 0){
                  this.discount = 0;
                  this.code_discount = '';
                  this.discount_active = false;
              } else {
                  this.discount_error = 'Select Order First';
              }

          },
          changeCat(id){
              this.loading = true;
              if(id === 'all'){
                  this.getAllProduct();
              } else {
                  axios.get(`/api/categories/${id}`)
                      .then(res  => {
                          this.dataProduct = res.data.data.products;
                      })
                      .catch(e => console.log(e.data.errors))
                      .finally(() => this.loading = false);
              }
          },
          getAllProduct(){
              this.loading = true;
              axios.get(`/api/products`)
                  .then(res  => {
                      this.dataProduct = res.data.data;
                      axios.get(`/api/categories`)
                          .then(r  => {
                              this.dataCategory = r.data.data;
                          })
                          .catch(e => console.log(e.data.errors));
                  })
                  .catch(e => console.log(e.data.errors))
                  .finally(() => this.loading = false);
          },
          submitOrder(){
              if(this.dataOrder.length > 0){
                  try{
                      const total = {
                          total: this.countTotalDiscount
                      };
                      console.log(total);
                      axios.post('/api/orders', total).then(res => {
                          const id_order = res.data.data.id;
                          this.dataOrder.forEach(item => {
                              item.id_order = id_order;
                              item.id_product = item.id;
                              item.quantity = item.qty;
                              axios.post('/api/create-detail', item);
                          })
                          this.dataOrder = [];
                      });
                  } catch (e) {
                      console.log(e);
                  }
              }
          },
        },
        updated() {
            $(document).ready(function () {

                $(".value-filter").click(function () {
                    $(".item-filter").toggleClass("expand");
                    console.log('test');
                });

                $(".filter-choice").click(function () {
                    let filter = $(".filter-choice");
                    filter.removeClass("selected");
                    $(this).toggleClass("selected");
                });

                $(".item-filter .item").click(function () {
                    let item = $(".item-filter .item");
                    let value = $(".value-filter");
                    item.removeClass("active");
                    $(this).toggleClass("active");
                    $(".item-filter").toggleClass("expand");
                    value.text(this.innerText);
                });
            });
        },
        computed: {
            countTotalDiscount: function(){
                let total = this.dataOrder.length > 0 ? this.dataOrder.reduce((n, { price, qty }) => n + (price * qty),0) : 0;
                if(this.discount > 0){
                    let discount = total * (this.discount / 100);
                    return (total - discount).toFixed(1);
                } else {
                    return total;
                }

            },
            countTotal: function () {
                return this.dataOrder.length > 0 ? this.dataOrder.reduce((n, { price, qty }) => n + (price * qty),0) : 0;
            },
            textDiscount: function () {
                return !this.discount ? 'apply' : 'remove';
            },
        }

    }
</script>

<style scoped>

</style>
