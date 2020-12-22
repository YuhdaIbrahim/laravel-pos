import VueRouter from "vue-router";
import Home from "./pages/Home";
import Login from "./pages/Login";
import Orders from "./pages/Orders";
const routes = [
    {
        path: '/',
        component: Home,
        name: "home",
    },
    {
        path: '/login',
        component: Login,
        name: "login",
    },
    {
        path: '/orders',
        component: Orders,
        name: "orders",
    },
]

const router = new VueRouter({
    mode:"history",
    routes,
    linkActiveClass: "active",
});

export default router;