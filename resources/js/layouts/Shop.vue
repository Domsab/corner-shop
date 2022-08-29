<template>
    <div
        v-show="route.name !== 'checkout'"
        class="bg-white">
        <!-- menu -->
        <header class="relative">
            <nav aria-label="Top">
                <!-- Top navigation -->
                <div class="bg-gray-900">
                    <div
                        class="flex items-center justify-between h-10 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8"
                    >
                        <p
                            class="flex-1 text-sm font-medium text-center text-white lg:flex-none"
                        >
                            Get free delivery on orders over $100
                        </p>

                        <div>
                            <div v-if="userStore.isLoggedIn">
                                <form method="POST" action="/logout">
                                    <input type="hidden" name="_token" :value="csrfToken">
                                    <button class="text-sm font-medium text-white hover:text-gray-100">
                                        Sign out
                                    </button>
                                </form>
                            </div>
                            <div
                                v-else
                                class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6"
                            >
                                <a
                                    href="/register"
                                    class="text-sm font-medium text-white hover:text-gray-100"
                                    >Create an account</a
                                >
                                <span
                                    class="w-px h-6 bg-gray-600"
                                    aria-hidden="true"
                                />
                                <a
                                    href="/login"
                                    class="text-sm font-medium text-white hover:text-gray-100"
                                    >Sign in</a
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shop navigation -->
                <div class="bg-white">
                    <div class="px-4 mx-auto max-w-7xl">
                        <div class="border-b border-gray-200">
                            <div class="flex items-center justify-between h-16">
                                <!-- Logo (lg+) -->

                                <div class="hidden lg:flex lg:items-center">
                                    <a href="/">
                                        <span class="sr-only">Workflow</span>
                                        <img
                                            class="w-auto h-8"
                                            src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600"
                                            alt=""
                                        />
                                    </a>
                                </div>

                                <div class="z-50 hidden h-full lg:flex">
                                    <!-- Mega menus -->

                                    <PopoverGroup class="ml-8">
                                        <div
                                            class="flex justify-center h-full space-x-8"
                                        >
                                            <Popover
                                                v-for="department in navigation"
                                                :key="department.name"
                                                class="flex"
                                                v-slot="{ openMenu }"
                                            >
                                                <div class="relative flex">
                                                    <PopoverButton
                                                        :class="[
                                                            openMenu
                                                                ? 'border-indigo-600 text-indigo-600'
                                                                : 'border-transparent text-gray-700 hover:text-gray-800',
                                                            'relative z-10 flex items-center transition-colors ease-out duration-200 text-lg border-b-2 -mb-px pt-px',
                                                        ]"
                                                    >
                                                        {{ department.name }}
                                                    </PopoverButton>
                                                </div>

                                                <transition
                                                    enter-active-class="transition duration-200 ease-out"
                                                    enter-from-class="opacity-0"
                                                    enter-to-class="opacity-100"
                                                    leave-active-class="transition duration-150 ease-in"
                                                    leave-from-class="opacity-100"
                                                    leave-to-class="opacity-0"
                                                >
                                                    <PopoverPanel
                                                        class="absolute inset-x-0 text-sm text-gray-500 top-full"
                                                    >
                                                        <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                                        <div
                                                            class="absolute inset-0 bg-white shadow top-1/2"
                                                            aria-hidden="true"
                                                        />

                                                        <div
                                                            class="relative bg-white"
                                                        >
                                                            <div
                                                                class="px-8 mx-auto max-w-7xl"
                                                            >
                                                                <div
                                                                    class="grid grid-cols-6 pt-8 pb-16 gap-y-10 gap-x-8"
                                                                >
                                                                    <!-- Categories -->

                                                                    <div
                                                                        v-for="category in department.categories"
                                                                        :key="
                                                                            category.name
                                                                        "
                                                                    >
                                                                        <router-link
                                                                            :to="{
                                                                                name: 'catalog',
                                                                                params: {
                                                                                    slug: category.slug,
                                                                                },
                                                                            }"
                                                                            @click="showCategory(category.slug)"
                                                                            aria-hidden="true"
                                                                            class="flex my-1 text-lg text-gray-700"
                                                                            >{{
                                                                                category.name
                                                                            }}</router-link
                                                                        >

                                                                        <ul
                                                                            role="list"
                                                                            class="mt-6 space-y-6 sm:mt-4 sm:space-y-4"
                                                                        >
                                                                            <li
                                                                                v-for="sub_categories in category.sub_categories"
                                                                                :key="
                                                                                    sub_categories.id
                                                                                "
                                                                                class="flex"
                                                                            >
                                                                                <router-link
                                                                                    :to="{
                                                                                        name: 'catalog',
                                                                                        params: {
                                                                                            slug: sub_categories.slug,
                                                                                        },
                                                                                    }"
                                                                                    :active="active"
                                                                                    @click="showCategory"
                                                                                    class="font-medium text-gray-800 first-line:hover:text-gray-800"
                                                                                >
                                                                                    {{
                                                                                        sub_categories.name
                                                                                    }}
                                                                                </router-link>
                                                                            </li>
                                                                            <li
                                                                                class="flex"
                                                                            >
                                                                                <router-link
                                                                                    :to="{
                                                                                        name: 'catalog',
                                                                                        params: {
                                                                                            slug: category.slug,
                                                                                        },
                                                                                    }"
                                                                                    @click="showCategory"
                                                                                    :active="active"
                                                                                    class="font-medium text-gray-700 first-line:hover:text-gray-800"
                                                                                >
                                                                                    Shop
                                                                                    all
                                                                                    {{
                                                                                        category.name
                                                                                    }}
                                                                                </router-link>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </PopoverPanel>
                                                </transition>
                                            </Popover>
                                        </div>
                                    </PopoverGroup>
                                </div>

                                <!-- Logo (lg-) -->
                                <a href="#" class="lg:hidden">
                                    <span class="sr-only">Workflow</span>
                                    <img
                                        src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600"
                                        alt=""
                                        class="w-auto h-8"
                                    />
                                </a>

                                <div
                                    class="flex items-center justify-end flex-1"
                                >
                                    <div class="flex items-center lg:ml-8">
                                        <div class="flex space-x-8">
                                            <div class="hidden lg:flex">
                                                <a
                                                    href="search"
                                                    class="p-2 -m-2 text-gray-400 hover:text-gray-500"
                                                >
                                                    <span class="sr-only"
                                                        >Search</span
                                                    >
                                                    <SearchIcon
                                                        class="w-6 h-6"
                                                        aria-hidden="true"
                                                    />
                                                </a>
                                            </div>

                                            <div class="flex">
                                                <a
                                                    href="/account-profile"
                                                    class="p-2 -m-2 text-gray-400 hover:text-gray-500"
                                                >
                                                    <span class="sr-only"
                                                        >Account</span
                                                    >
                                                    <UserIcon
                                                        class="w-6 h-6"
                                                        aria-hidden="true"
                                                    />
                                                </a>
                                            </div>
                                        </div>

                                        <span
                                            class="w-px h-6 mx-4 bg-gray-200 lg:mx-6"
                                            aria-hidden="true"
                                        />

                                        <div class="flow-root">
                                            <a
                                                @click="showShoppingBag"
                                                class="flex items-center p-2 -m-2 group"
                                            >
                                                <ShoppingBagIcon
                                                    class="flex-shrink-0 w-6 h-6 text-gray-400 group-hover:text-gray-500"
                                                    aria-hidden="true"
                                                />
                                                <span
                                                    class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800"
                                                    >{{ shoppingBagStore.$state.bagItems.length }}</span
                                                >
                                                <span class="sr-only"
                                                    >items in cart, view
                                                    bag</span
                                                >
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <ShoppingCart :showBag="showBag" @close="closeShoppingBag" />

    </div>

    <router-view />

    <Footer />
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
import { useShoppingCartStore } from '../stores/shopping-cart';
import { useUserStore } from '../stores/user';
import axios from "axios";

import Footer from "../components/Footer.vue";
import Home from "../pages/Home.vue";
import Categories from "../pages/Categories.vue";
import ProductDetails from "../pages/ProductDetails.vue";
import ShoppingCart from "../pages/ShoppingCart.vue";

import { useRoute } from "vue-router"

const featuredCategories = [
    {
        name: "Women's",
        href: "#",
        imageSrc:
            "https://tailwindui.com/img/ecommerce-images/home-page-04-collection-01.jpg",
        imageAlt: "Woman wearing a comfortable cotton t-shirt.",
    },
    {
        name: "Men's",
        href: "#",
        imageSrc:
            "https://tailwindui.com/img/ecommerce-images/home-page-04-collection-02.jpg",
        imageAlt: "Man wearing a comfortable and casual cotton t-shirt.",
    },
    {
        name: "Desk Accessories",
        href: "#",
        imageSrc:
            "https://tailwindui.com/img/ecommerce-images/home-page-04-collection-03.jpg",
        imageAlt:
            "Person sitting at a wooden desk with paper note organizer, pencil and tablet.",
    },
];

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

        watch(
            () => route.params,
            () => {
                console.log('params', route.name)
            }
        )

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
