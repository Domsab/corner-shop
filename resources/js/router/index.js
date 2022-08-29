import ShopApp from '../layouts/Shop'
import AdminApp from '../layouts/Admin'

import shopRoutes from './shop'
import adminRoutes from './admin'
import accountRoutes from './account'

import {useUserStore} from '../stores/user.js'

import { createRouter, createWebHistory } from "vue-router"

function requiresAuth (to, from, next) {
    const userStore = useUserStore();

    (userStore.isLoggedIn)
        ? next()
        : window.location.href = '/login';
}

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            name: 'home',
            path: '/',
            component: ShopApp,
            children: shopRoutes,
        },
        {
            name: 'admin',
            path: '/admin',
            component: AdminApp,
            beforeEnter: requiresAuth,
            children: adminRoutes,
        },
        {
            name: 'accounts',
            path: '/accounts',
            component: AdminApp,
            beforeEnter: requiresAuth,
            children: accountRoutes,
        },
    ]
});



export default router;
