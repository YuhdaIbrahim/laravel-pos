require('./bootstrap');
import router from "./routes";
import VueRouter from "vue-router";
import Vuex from 'vuex'
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
import index from './index';
import storeDefinition from './store';



window.Vue = require('vue');
window.$ = require('jquery')
Vue.use(VueRouter);
Vue.use(Vuex);
Vue.component("VueSlickCarousel",VueSlickCarousel);

const store = new Vuex.Store(storeDefinition)

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!store.getters.loggedIn) {
            next({
                name: 'login'
            })
        } else {
            next()
        }
    } else if (to.matched.some(record => record.meta.requiresVisitor)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (store.getters.loggedIn) {
            next({
                name: 'dashboard'
            })
        } else {
            next()
        }
    }
    else {
        next() // make sure to always call next()!
    }
})


const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        index
    }
});
