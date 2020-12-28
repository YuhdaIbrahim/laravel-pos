<template>
    <div class="nav">
        <router-link class="nav-link" :to="{name: 'home'}" exact>Home</router-link>
        <router-link class="nav-link" :to="{name: 'orders'}">Orders</router-link>
        <router-link v-if="!isLogin" class="nav-link" :to="{name: 'login'}">Login</router-link>
        <a v-else @click="logOut" class="nav-link">Logout</a>
    </div>
</template>

<script>
    export default {
        name: "Navigation",
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
