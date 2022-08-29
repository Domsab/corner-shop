import { createApp } from 'vue';

import { createPinia } from 'pinia';

import XoShop from './XoShop.vue';

import router from './router/index';


const xoShopApp = createApp({});

xoShopApp.component('xo-shop', XoShop);

xoShopApp.use(createPinia())
    .use(router);

xoShopApp.mount('#xo-shop-app');


// const xoAdminApp = createApp({});

// xoAdminApp.component('xo-admin', XoAdmin);

// xoAdminApp.use(ShopRouter);

// xoAdminApp.mount('#xo-admin-app');
