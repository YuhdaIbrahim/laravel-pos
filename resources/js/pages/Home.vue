<template>
    <div class="container-fluid main-wrapper">
        <div class="row main-content">
            <div class="col-lg-8">
                <div class="upper-section">
                    <nav class="nav">
                        <router-link to="/" exact>Home</router-link>
                        <router-link to="/orders">Orders</router-link>
                        <router-link to="/login">Login</router-link>
                    </nav>
                    <div class="product-tab">
                        <div class="item-product">
                            <span class="type">Type</span>
                            <img src="img/food-1.png" alt="">
                            <div class="product">
                                <p>Chicken</p>
                                <span>$30</span>
                            </div>
                        </div>
                        <div class="item-product">
                            <span class="type">Type</span>
                            <img src="img/food-1.png" alt="">
                            <div class="product">
                                <p>Chicken</p>
                                <span>$30</span>
                            </div>
                        </div>
                        <div class="item-product">
                            <span class="type">Type</span>
                            <img src="img/food-1.png" alt="">
                            <div class="product">
                                <p>Chicken</p>
                                <span>$30</span>
                            </div>
                        </div>
                        <div class="item-product">
                            <span class="type">Type</span>
                            <img src="img/food-1.png" alt="">
                            <div class="product">
                                <p>Chicken</p>
                                <span>$30</span>
                            </div>
                        </div>
                        <div class="item-product">
                            <span class="type">Type</span>
                            <img src="img/food-1.png" alt="">
                            <div class="product">
                                <p>Chicken</p>
                                <span>$30</span>
                            </div>
                        </div>
                        <div class="item-product">
                            <span class="type">Type</span>
                            <img src="img/food-1.png" alt="">
                            <div class="product">
                                <p>Chicken</p>
                                <span>$30</span>
                            </div>
                        </div>
                        <div class="item-product">
                            <span class="type">Type</span>
                            <img src="img/food-1.png" alt="">
                            <div class="product">
                                <p>Chicken</p>
                                <span>$30</span>
                            </div>
                        </div>
                        <div class="item-product">
                            <span class="type">Type</span>
                            <img src="img/food-1.png" alt="">
                            <div class="product">
                                <p>Chicken</p>
                                <span>$30</span>
                            </div>
                        </div>
                        <div class="item-product">
                            <span class="type">Type</span>
                            <img src="img/food-1.png" alt="">
                            <div class="product">
                                <p>Chicken</p>
                                <span>$30</span>
                            </div>
                        </div>
                        <div class="item-product">
                            <span class="type">Type</span>
                            <img src="img/food-1.png" alt="">
                            <div class="product">
                                <p>Chicken</p>
                                <span>$30</span>
                            </div>
                        </div>
                        <div class="item-product">
                            <span class="type">Type</span>
                            <img src="img/food-1.png" alt="">
                            <div class="product">
                                <p>Chicken</p>
                                <span>$30</span>
                            </div>
                        </div>
                        <div class="item-product">
                            <span class="type">Type</span>
                            <img src="img/food-1.png" alt="">
                            <div class="product">
                                <p>Chicken</p>
                                <span>$30</span>
                            </div>
                        </div>
                        <div class="item-product">
                            <span class="type">Type</span>
                            <img src="img/food-1.png" alt="">
                            <div class="product">
                                <p>Chicken</p>
                                <span>$30</span>
                            </div>
                        </div>
                        <div class="item-product">
                            <span class="type">Type</span>
                            <img src="img/food-1.png" alt="">
                            <div class="product">
                                <p>Chicken</p>
                                <span>$30</span>
                            </div>
                        </div>
                        <div class="item-product">
                            <span class="type">Type</span>
                            <img src="img/food-1.png" alt="">
                            <div class="product">
                                <p>Chicken</p>
                                <span>$30</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-section">
                    <div class="filter">
                        <div class="value-filter">
                            All Categories
                        </div>
                        <div class="item-filter">
                            <div class="item active">tes 1 <i class="fa fa-check"></i></div>
                            <div class="item">tes 2 <i class="fa fa-check"></i></div>
                            <div class="item">tes 3 <i class="fa fa-check"></i></div>
                            <div class="item">tes 4 <i class="fa fa-check"></i></div>
                        </div>
                    </div>
                    <div class="container-slick">
                        <VueSlickCarousel  v-bind="settings">
                            <div class="filter-choice"> Your Content </div>
                            <div class="filter-choice"> Your Content </div>
                            <div class="filter-choice"> Your Content </div>
                            <div class="filter-choice"> Your Content </div>
                            <div class="filter-choice"> Your Content </div>
                            <div class="filter-choice"> Your Content </div>
                            <div class="filter-choice"> Your Content </div>
                            <div class="filter-choice"> Your Content </div>
                            <div class="filter-choice"> Your Content </div>
                            <div class="filter-choice"> Your Content </div>
                            <div class="filter-choice"> Your Content </div>
                        </VueSlickCarousel >
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="checkout">
                    <div class="header">
                        <h2>Order</h2>
                        <div class="line"></div>
                    </div>
                    <div class="body">
                        <div class="item-checkout">
                            <div class="item">
                                <div class="product">
                                    <div class="qty">
                                        <i class="fa fa-minus"></i>
                                        <div class="circle">
                                            1
                                        </div>
                                        <i class="fa fa-plus"></i>
                                    </div>
                                    <div class="name-product">
                                        <div class="name">Icecream</div>
                                        <div class="price">$15</div>
                                    </div>
                                </div>
                                <div class="price-close">
                                    <div class="total">$30</div>
                                    <i class="fa fa-close"></i>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product">
                                    <div class="qty">
                                        <i class="fa fa-minus"></i>
                                        <div class="circle">
                                            1
                                        </div>
                                        <i class="fa fa-plus"></i>
                                    </div>
                                    <div class="name-product">
                                        <div class="name">Icecream</div>
                                        <div class="price">$15</div>
                                    </div>
                                </div>
                                <div class="price-close">
                                    <div class="total">$30</div>
                                    <i class="fa fa-close"></i>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product">
                                    <div class="qty">
                                        <i class="fa fa-minus"></i>
                                        <div class="circle">
                                            1
                                        </div>
                                        <i class="fa fa-plus"></i>
                                    </div>
                                    <div class="name-product">
                                        <div class="name">Icecream</div>
                                        <div class="price">$15</div>
                                    </div>
                                </div>
                                <div class="price-close">
                                    <div class="total">$30</div>
                                    <i class="fa fa-close"></i>
                                </div>
                            </div>
                        </div>
                        <div class="discount">
                            <div class="label">
                                Discount
                            </div>
                            <div class="coupon">
                                <input type="text" class="input-text">
                                <div class="apply">
                                    <button>Apply</button>
                                    <div class="text-discount">discount 10%</div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-checkout">
                            <div class="total">
                                <p class="label-price">Total</p>
                                <div class="price">
                                    <div class="pay-price">$54</div>
                                    <div class="price-wrapper">
                                        <div class="price-slash"></div>
                                        <div class="pay-discount">$60</div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="btn-pay">
                        <div class="text">pay</div>
                        <div class="price">$54</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Home",
        data() {
            return {
                settings: {
                    "dots": false,
                    "arrows": false,
                    "edgeFriction": 0,
                    "speed": 300,
                    "slidesToShow": 6,
                    "slidesToScroll": 1,
                    "infinite" : false,
                    "touchThreshold": 10,
                },
            }
        },
        mounted() {
            $(document).ready(function () {

                $(".value-filter").click(function () {
                    $(".item-filter").toggleClass("expand");
                    console.log('test');
                });

                $(".filter-choice").click(function () {
                    let filter = $(".filter-choice");
                    filter.removeClass("selected");
                    $(this).toggleClass("selected");
                });

                $(".item-filter .item").click(function () {
                    let item = $(".item-filter .item");
                    let value = $(".value-filter");
                    item.removeClass("active");
                    $(this).toggleClass("active");
                    $(".item-filter").toggleClass("expand");
                    value.text(this.innerText);
                });
            });
        }

    }
</script>

<style scoped>

</style>
