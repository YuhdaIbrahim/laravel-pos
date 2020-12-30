<template>
    <div class="sidebar">
        <h4>Welcome, Admin</h4>
        <h2>Dashboard</h2>
        <div class="line"></div>

        <div class="sidebar-content">
            <RouterLink :to="{name: 'dashboard'}" class="sidebar-link">Home</RouterLink>
            <RouterLink :to="{name: 'product'}" class="sidebar-link">Product</RouterLink>
            <RouterLink :to="{name: 'order-dashboard'}" class="sidebar-link">Orders</RouterLink>
            <RouterLink :to="{name: 'employee'}" class="sidebar-link">Employees</RouterLink>
            <RouterLink :to="{name: 'roles'}" class="sidebar-link">Roles</RouterLink>
        </div>

        <div class="nav">
            <RouterLink :to="{name: 'dashboard'}" class="nav-link">Dashboard</RouterLink>
            <RouterLink :to="{name: 'account'}" class="nav-link">Account</RouterLink>
            <a @click="logOut" class="nav-link">Logout</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "sidebar",
        methods: {
            logOut(){
                this.$store.dispatch('logout').then(() => {
                    this.$router.push({name: 'login'})
                })
            }
        }
    }
</script>

<style scoped>

</style>
