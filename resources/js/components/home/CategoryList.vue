<template>
    <div class="category-list">
            <p @click="changeCat('all')" class="filter-choice">All Category</p>
            <p @click="changeCat(item.id)" class="filter-choice" v-for="item in dataCategory"> {{ item.name_category }} </p>
    </div>
</template>

<script>
    export default {
        name: "CategoryList",
        props:{
            dataCategory: Array,
            changeCat: Function,
        },
    }
</script>

<style scoped>

</style>
