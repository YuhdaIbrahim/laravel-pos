import VueRouter from "vue-router";
import Home from "./pages/Home";
import Login from "./pages/Login";
import Orders from "./pages/Orders";
import Dashboard from "./pages/Dashboard";
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
        meta: {
            requiresVisitor: true,
        }
    },
    {
        path: '/orders',
        component: Orders,
        name: "orders",
    },
    {
        path: '/dashboard',
        component: Dashboard,
        name: "dashboard",
        meta: {
            requiresAuth: true,
        }
    },
]

const router = new VueRouter({
    mode:"history",
    routes,
    linkActiveClass: "active",
});

export default router;
