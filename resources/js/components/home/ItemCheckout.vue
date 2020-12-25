<template>
    <div class="item-checkout">
        <div :class="[{'active': dataOrder.length > 0}]" class="status-order">
            <transition name="fade">
                <h4 v-if="dataOrder.length < 1">No Order Yet!</h4>
            </transition>
        </div>

        <transition-group name="list">
            <div v-if="dataOrder.length > 0" class="item" :key="item.id" v-for="item in values">
                <div class="product">
                    <div class="qty">
                        <i @click="minQty(item.id)" class="fa fa-minus"></i>
                        <div  class="circle">
                            {{ item.qty }}
                        </div>
                        <i @click="plusQty(item.id)" class="fa fa-plus"></i>
                    </div>
                    <div class="name-product">
                        <div class="name">{{ (item.name_product).slice(0,10) + '...' }}</div>
                        <div class="price">${{ item.price }}</div>
                    </div>
                </div>
                <div class="price-close">
                    <div class="total">${{ item.qty * item.price }}</div>
                    <i @click="removeItem(item.id)" class="fa fa-close"></i>
                </div>
            </div>
        </transition-group>

    </div>
</template>

<script>
    export default {
        name: "ItemCheckout",
        props: {
            dataOrder: Array,
            plusQty: Function,
            minQty: Function,
            removeItem: Function,
        },
        data() {
            return {
                order: this.values,
            }
        },
        methods: {
        },
        computed: {
            values(){
                return this.dataOrder.length > 0 && this.dataOrder;
            },

        }
    }
</script>

<style scoped>

</style>
