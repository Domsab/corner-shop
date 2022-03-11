import { createApp } from 'vue';

import XoShop from './XoShop.vue';

import XoDashboard from './XoDashboard.vue';

const xoShopApp = createApp({});

xoShopApp.component('xo-shop', XoShop);

xoShopApp.mount('#xo-shop-app');

const xoDashboardApp = createApp({});

xoDashboardApp.component('xo-dashboard', XoDashboard);

xoDashboardApp.mount('#xo-dashboard-app');
