<template>
    <div class="details">
        <transition name="fade">
            <div v-if="loading" class="loading">
                Loading...
            </div>
        </transition>
        <transition name="fade">
            <div v-if="!loading" class="details-content">
                <div class="header">
                    <div class="process-order">
                        <h4 class="id-order">#{{ detailOrder.id }}</h4>
                        <p :class="[
                    { pending: detailOrder.status === 'process' },
                    { success: detailOrder.status === 'success' },
                    { cancel: detailOrder.status === 'cancel' },
                    ]" class="process">{{ detailOrder.status }}</p>
                    </div>
                    <div class="total">
                        <h4>Total : ${{ detailOrder.total }}</h4>
                    </div>
                </div>
                <div class="body">
                    <h4>Details Order</h4>
                    <div class="top">
                        <p>items</p>
                        <p>amount</p>
                    </div>
                    <div class="detail-order">
                        <div v-for="(item, index) in detailOrder.order_details" :key="item.id" class="item">
                            <div class="order">
                                <img :src="detailOrder.product_details[index].img_path" alt="food">
                                <h4 class="name">{{ item.quantity }}x {{ detailOrder.product_details[index].name_product }}</h4>
                            </div>
                            <h4 class="amount">${{ detailOrder.product_details[index].price * item.quantity }}</h4>
                        </div>
                    </div>
                </div>
                <transition name="fade">
                    <Footer :id="detailOrder.id" :set-cancel="setCancel" :set-success="setSuccess" v-if="checkStatus"></Footer>
                </transition>
            </div>
        </transition>

    </div>
</template>

<script>
    import Footer from "./Footer";
    export default {
        name: "DetailOrder",
        props: {
            detailOrder: Object,
            loading: Boolean,
            setCancel: Function,
            setSuccess: Function,
        },
        components: {
            Footer,
        },
        computed: {
            checkStatus(){
                return this.detailOrder.status !== 'success' && this.detailOrder.status !== 'cancel';
            }
        }
    }
</script>

<style scoped>

</style>
