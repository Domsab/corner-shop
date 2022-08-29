import Home from '../pages/Home.vue';
import Categories from '../pages/Categories.vue';
import ProductDetails from '../pages/ProductDetails.vue';
import Checkout from '../pages/Checkout';

 export default [
        {
            name: 'home',
            path: '/',
            component: Home,
        },
        {
            name: 'catalog',
            path: '/shop/:slug',
            component: Categories,
        },
        {
            name: 'product',
            path: '/shop/item/:slug',
            component: ProductDetails,
        },
        {
            name: 'checkout',
            path: '/checkout',
            component: Checkout,
        },
        // {
        //     name: 'payment',
        //     path: '/payment',
        //     component: Payment,
        // }
    ]
// export default routes;
