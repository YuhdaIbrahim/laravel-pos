<template>
    <div class="item-order">
        <div @click="selectOrder(item.id)" v-for="(item, index) in items" :class="[{ active: index === 0  }]" class="item">
            <div class="order">
                <h4 class="id-order">#{{ item.id }}</h4>
                <p :class="[
                    { pending: item.status === 'process' },
                    { success: item.status === 'success' },
                    { cancel: item.status === 'cancel' },
                    ]" class="process">{{ item.status }}</p>
            </div>
            <h4 class="price">${{ item.total }}</h4>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Items-order",
        props: {
            items: Array,
            selectOrder: Function,
        },
    }
</script>

<style scoped>

</style>
