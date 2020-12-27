<template>
    <div class="nav">
        <router-link class="nav-link" :to="{name: 'home'}" exact>Home</router-link>
        <router-link class="nav-link" :to="{name: 'orders'}">Orders</router-link>
        <router-link class="nav-link" :to="{name: 'login'}">Login</router-link>
    </div>
</template>

<script>
    export default {
        name: "Navigation"
    }
</script>

<style scoped>

</style>
