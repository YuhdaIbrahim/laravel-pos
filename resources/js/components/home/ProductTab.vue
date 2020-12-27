<template>
    <TransitionGroup name="product" class="product-tab" tag="div">
        <div @click="addOrder(product)" v-for="(product, index) in dataProduct" :key="product.id" class="item-product">
            <span class="type">{{ product.category }}</span>
            <img :src="product.img_path +'?' + Date.now()" :alt="product.img">
            <div class="product">
                <p>{{ slicingName(product.name_product) }}</p>
                <span>${{ product.price }}</span>
            </div>
        </div>
    </TransitionGroup>
</template>

<script>
    export default {
        name: "ProductTab",
        props:['dataProduct', 'addOrder'],
        methods: {
            slicingName(name){
                let strLength = name.length;
                if(strLength >= 10){
                    return name.slice(0,10) + '...';
                }
                return name;
            },
        }
    }
</script>

<style scoped>

</style>
