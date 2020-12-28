<template>
    <nav class="nav">
        <router-link :to="{name: 'home'}" exact>Home</router-link>
        <router-link :to="{name: 'orders'}">Orders</router-link>
        <router-link v-if="!isLogin" :to="{name: 'login'}">Login</router-link>
        <a v-else @click="logOut" >Logout</a>
    </nav>
</template>

<script>
    export default {
        name: "NavigationIndex",
        methods: {
            logOut(){
                this.$store.dispatch('logout').then(() => {
                    this.$router.push({name: 'login'})
                })
            }
        },
        computed: {
            isLogin(){
                return this.$store.getters.loggedIn;
            },
        }
    }
</script>

<style scoped>

</style>
