require('./bootstrap');
import router from "./routes";
import VueRouter from "vue-router";
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
import index from './index';



window.Vue = require('vue');
window.$ = require('jquery')
Vue.use(VueRouter);
Vue.component("VueSlickCarousel",VueSlickCarousel);



const app = new Vue({
    el: '#app',
    router,
    components: {
        index
    }
});
