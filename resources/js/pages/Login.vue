<template>
    <div class="login-wrapper">
        <div class="card-login">
            <div class="card-nav">
                <router-link class="nav-link" :to="{name: 'home'}" exact>Home</router-link>
                <router-link class="nav-link" :to="{name: 'orders'}">Orders</router-link>
                <router-link class="nav-link" :to="{name: 'login'}">Login</router-link>
            </div>
            <form action="#">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control">
                </div>
                <button class="btn-login">Login</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login"
    }
</script>

<style scoped>

</style>
