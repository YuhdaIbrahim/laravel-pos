<template>
    <nav class="nav">
        <router-link :to="{name: 'home'}" exact>Home</router-link>
        <router-link :to="{name: 'orders'}">Orders</router-link>
        <router-link :to="{name: 'login'}">Login</router-link>
    </nav>
</template>

<script>
    export default {
        name: "NavigationIndex"
    }
</script>

<style scoped>

</style>
