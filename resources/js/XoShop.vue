<template>
    <router-view />
</template>

<script>

import {
    Dialog,
    DialogOverlay,
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    Tab,
    TabGroup,
    TabList,
    TabPanel,
    TabPanels,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";

import {
    MenuIcon,
    QuestionMarkCircleIcon,
    SearchIcon,
    ShoppingBagIcon,
    XIcon,
    UserIcon,
} from "@heroicons/vue/outline";

import { ref, onMounted, watch } from "vue";
import { useShoppingCartStore } from './stores/shopping-cart';
import { useUserStore } from './stores/user';
import axios from "axios";

import Footer from "./components/Footer.vue";
import Home from "./pages/Home.vue";
import Categories from "./pages/Categories.vue";
import ProductDetails from "./pages/ProductDetails.vue";
import ShoppingCart from "./pages/ShoppingCart.vue";

import { useRoute } from "vue-router"

export default {
    components: {
        Dialog,
        DialogOverlay,
        Popover,
        PopoverButton,
        PopoverGroup,
        PopoverPanel,
        Tab,
        TabGroup,
        TabList,
        TabPanel,
        TabPanels,
        TransitionChild,
        TransitionRoot,
        MenuIcon,
        QuestionMarkCircleIcon,
        SearchIcon,
        ShoppingBagIcon,
        UserIcon,
        XIcon,
        Footer,
        Home,
        Categories,
        ProductDetails,
        ShoppingCart,
    },

    setup() {
        const userStore = useUserStore();
        const shoppingBagStore = useShoppingCartStore();
        const route = useRoute();

        const openMenu = ref(true);
        const showBag = ref(false);
        const navigation = ref([]);

        const csrfToken = window.laravel.csrfToken

        // watch(
        //     () => route.params,
        //     () => {
        //         console.log('params', route.name)
        //     }
        // )

        watch(
            () => openMenu.value,
            () => {
                console.log('openMenu', openMenu.value)
            }
        )

        onMounted(() => {
            getData();
            shoppingBagStore.getShopping();
        });

        function showShoppingBag() {
            if(shoppingBagStore.bagItems.length > 0){
                showBag.value = true;
            }

            console.log("showShoppingBag", showBag.value);
        };

        function closeShoppingBag() {
            showBag.value = false;
            console.log("closeShoppingBag", showBag.value);
        };

        function showCategory() {
            // // route.push({ name: '' })
            // openMenu.value = false;
            // console.log(openMenu);
        }

        function getData() {
            axios.get("/navigation")
                .then((response) => {
                    console.log(response.data.data);
                    navigation.value = response.data.data;

                    // Next we want to get featured products
                    return axios.get(`/featured-products`);
                });
        };

        return {
            navigation,
            // openMenu,
            showBag,
            shoppingBagStore,
            userStore,
            showCategory,
            showShoppingBag,
            closeShoppingBag,
            csrfToken,
            route,
        }

    },
};
</script>
