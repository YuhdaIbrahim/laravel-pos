<template>
    <div class="login-wrapper">
        <div class="card-login">
            <div class="card-nav">
                <router-link class="nav-link" :to="{name: 'home'}" exact>Home</router-link>
                <router-link class="nav-link" :to="{name: 'orders'}">Orders</router-link>
                <router-link v-if="isLogin" class="nav-link" :to="{name: 'login'}">Login</router-link>
                <a v-else class="nav-link" @click="logOut" >Logout</a>
            </div>
            <form action="#" @submit.prevent="login">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" v-model="user.username" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" v-model="user.password" type="password" class="form-control">
                </div>
                <button class="btn-login">Login</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data(){
          return {
              user: {
                  username: '',
                  password: '',
              }
          }
        },
        methods: {
            login(){
                this.$store.dispatch('retrieveToken', {
                    user: this.user
                }).then(res => {
                    this.$router.push({name: 'dashboard'})
                })
            },
            logOut(){
                this.$store.dispatch('logout').then(() => {
                    this.$router.push({name: 'login'})
                })
            },
        },
        computed :{
            isLogin(){
                return this.$store.getters.loggedIn;
            },
        }
    }
</script>

<style scoped>

</style>
