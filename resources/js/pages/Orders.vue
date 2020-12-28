<template>
    <section class="orders-wrapper">
        <div class="sidebar-order">
            <h3>Orders</h3>
            <div class="line"></div>
            <ItemOrders :select-order="selectOrder" :items="dataOrder"></ItemOrders>
            <navigation></navigation>
        </div>
        <detail-order :set-cancel="setCancel" :set-success="setSuccess" :loading="loading" :detail-order="detailOrder"></detail-order>
    </section>
</template>

<script>
    import ItemOrders from '../components/Orders/Items-order';
    import Navigation from "../components/Orders/Navigation";
    import DetailOrder from "../components/Orders/DetailOrder";
    import Footer from "../components/Orders/Footer";
    export default {
        name: "Orders",
        data(){
            return {
                loading: false,
                dataOrder: [],
                detailOrder: {}
            }
        },
        components: {
            ItemOrders,
            Navigation,
            DetailOrder,
            Footer,
        },
        methods: {
            getOrderToday(){
              this.loading = true;
              try {
                axios.get('/api/get-orders-today')
                    .then(res => {
                        this.dataOrder = res.data.data;
                        let id_Order = this.dataOrder[0].id;
                        axios.get(`/api/get-detail-order/${id_Order}`).then(res2 => {
                            this.detailOrder = res2.data.data
                            this.loading = false;
                        })
                    })
                    .catch(e => {
                        console.log(e);
                        this.loading = false;
                    });
              } catch (e) {
                  
              }
            },
            selectOrder(id){
                this.loading = true;
                try {
                    axios.get(`/api/get-detail-order/${id}`).then(res => this.detailOrder = res.data.data)
                } catch (e) {
                    console.log(e);
                }
                setTimeout(() => this.loading = false, 1000);
            },
            setCancel(id){
                try {
                    axios.put(`/api/set-order-status`, { id ,status: 'cancel' })
                    this.detailOrder.status = 'cancel'
                    this.getOrderToday();
                } catch (e) {
                    console.log(e);
                }
            },
            setSuccess(id){
                axios.put(`/api/set-order-status`, { id, status: 'success' })
                this.detailOrder.status = 'success'
                this.getOrderToday();
            }
        },
        created() {
            this.getOrderToday();
        },
        updated() {
            $(document).ready(function () {
                $(".item").click(function () {
                    let filter = $(".item");
                    filter.removeClass("active");
                    $(this).toggleClass("active");
                });
            })
        }
    }
</script>

<style scoped>

</style>
