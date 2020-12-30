import VueRouter from "vue-router";
import Home from "./pages/Home";
import Login from "./pages/Login";
import Orders from "./pages/Orders";
import Dashboard from "./pages/dashboard/Dashboard";
import Product from "./pages/dashboard/Product";
import Employee from "./pages/dashboard/Employee";
import orderDashboard from './pages/dashboard/Orders';
import Roles from "./pages/dashboard/Roles";
import Account from "./pages/dashboard/Account";
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
    {
        path: '/product',
        component: Product,
        name: "product",
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/order-dashboard',
        component: orderDashboard,
        name: "order-dashboard",
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/employee',
        component: Employee,
        name: "employee",
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/roles',
        component: Roles,
        name: "roles",
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/account',
        component: Roles,
        name: "account",
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
