import Home from '../pages/admin/Home.vue';
import Settings from '../pages/admin/Settings.vue';
import Categories from '../pages/admin/Categories.vue';
import Products from "../pages/admin/Products.vue";
import Attributes from "../pages/admin/Attributes.vue";
import GeminiWallet from "../pages/admin/GeminiWallet.vue";

export default [
        {
            name: 'admin-dashboard',
            path: '/admin',
            component: Home,
        },
        {
            name: 'admin-settings',
            path: '/admin-settings',
            component: Settings,
        },
        {
            name: 'admin-categories',
            path: '/admin-categories',
            component: Categories,
        },
        {
            name: 'admin-products',
            path: '/admin-products',
            component: Products,
        },
        {
            name: 'admin-attributes',
            path: '/admin-attributes',
            component: Attributes,
        },
        {
            name: 'admin-gemini-wallet',
            path: '/admin-gemini-wallet',
            component: GeminiWallet,
        },
    ]
;

