<template>
    <section class="orders-wrapper">
        <div class="sidebar-order">
            <h3>Orders</h3>
            <div class="line"></div>
            <div class="item-order">
                <div class="item active">
                    <div class="order">
                        <h4 class="id-order">#Order312212</h4>
                        <p class="process success">Done</p>
                    </div>
                    <h4 class="price">$30</h4>
                </div>
                <div class="item">
                    <div class="order ">
                        <h4 class="id-order">#Order312212</h4>
                        <p class="process success">Done</p>
                    </div>
                    <h4 class="price">$30</h4>
                </div>
                <div class="item">
                    <div class="order ">
                        <h4 class="id-order">#Order312212</h4>
                        <p class="process pending">Done</p>
                    </div>
                    <h4 class="price">$30</h4>
                </div>
                <div class="item">
                    <div class="order">
                        <h4 class="id-order">#Order312212</h4>
                        <p class="process pending">Done</p>
                    </div>
                    <h4 class="price">$30</h4>
                </div>
                <div class="item">
                    <div class="order">
                        <h4 class="id-order">#Order312212</h4>
                        <p class="process cancel">Done</p>
                    </div>
                    <h4 class="price">$30</h4>
                </div>
                <div class="item">
                    <div class="order">
                        <h4 class="id-order">#Order312212</h4>
                        <p class="process pending">Done</p>
                    </div>
                    <h4 class="price">$30</h4>
                </div>
                <div class="item">
                    <div class="order">
                        <h4 class="id-order">#Order312212</h4>
                        <p class="process pending">Done</p>
                    </div>
                    <h4 class="price">$30</h4>
                </div>
            </div>
            <div class="nav">
                <router-link to="/" class="nav-link" exact>Home</router-link>
                <router-link class="nav-link" to="/orders">Orders</router-link>
                <router-link class="nav-link" to="/login">Login</router-link>
            </div>
        </div>
        <div class="details">
            <div class="header">
                <div class="process-order">
                    <h4 class="id-order">#Order-3142212</h4>
                    <p class="process pending">Proses</p>
                </div>
                <div class="total">
                    <h4>Total : $30</h4>
                </div>
            </div>
            <div class="body">
                <h4>Details Order</h4>
                <div class="top">
                    <p>items</p>
                    <p>amount</p>
                </div>
                <div class="item">
                    <div class="order">
                        <img src="img/food-1.png" alt="food">
                        <h4 class="name">2x Burger Chesse double</h4>
                    </div>
                    <h4 class="amount">$20</h4>
                </div>
                <div class="item">
                    <div class="order">
                        <img src="img/food-1.png" alt="food">
                        <h4 class="name">2x Burger Chesse double</h4>
                    </div>
                    <h4 class="amount">$20</h4>
                </div>
                <div class="item">
                    <div class="order">
                        <img src="img/food-1.png" alt="food">
                        <h4 class="name">2x Burger Chesse double</h4>
                    </div>
                    <h4 class="amount">$20</h4>
                </div>
                <div class="item">
                    <div class="order">
                        <img src="img/food-1.png" alt="food">
                        <h4 class="name">2x Burger Chesse double</h4>
                    </div>
                    <h4 class="amount">$20</h4>
                </div>
                <div class="item">
                    <div class="order">
                        <img src="img/food-1.png" alt="food">
                        <h4 class="name">2x Burger Chesse double</h4>
                    </div>
                    <h4 class="amount">$20</h4>
                </div>
                <div class="item">
                    <div class="order">
                        <img src="img/food-1.png" alt="food">
                        <h4 class="name">2x Burger Chesse double</h4>
                    </div>
                    <h4 class="amount">$20</h4>
                </div>
            </div>
            <div class="footer">
                <button class="btn-cancel">Cancel</button>
                <button class="btn-finish">Finish</button>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Orders"
    }
</script>

<style scoped>

</style>
