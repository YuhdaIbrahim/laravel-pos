<template>
    <div class="product-tab">
        <div @click="addOrder(product)" v-for="product in dataProduct" :key="product.id" class="item-product">
            <span class="type">{{ product.category }}</span>
            <img :src="product.img_path +'?' + Date.now()" :alt="product.img">
            <div class="product">
                <p>{{ (product.name_product).slice(0,10) + '...' }}</p>
                <span>${{ product.price }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ProductTab",
        props:['dataProduct', 'addOrder'],
    }
</script>

<style scoped>

</style>
