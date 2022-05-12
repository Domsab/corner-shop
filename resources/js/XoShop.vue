<template>
    <div class="bg-white">
        <!-- Mobile menu -->
        <TransitionRoot as="template" :show="open">
            <Dialog as="div" class="fixed inset-0 z-40 flex lg:hidden" @close="open = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300"
                    enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300"
                    leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-black bg-opacity-25" />
                </TransitionChild>

                <TransitionChild as="template" enter="transition ease-in-out duration-300 transform"
                    enter-from="-translate-x-full" enter-to="translate-x-0"
                    leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0"
                    leave-to="-translate-x-full">
                    <div class="relative flex flex-col w-full max-w-xs pb-12 overflow-y-auto bg-white shadow-xl">
                        <div class="flex px-4 pt-5 pb-2">
                            <button type="button"
                                class="inline-flex items-center justify-center p-2 -m-2 text-gray-400 rounded-md"
                                @click="open = false">
                                <span class="sr-only">Close menu</span>
                                <XIcon class="w-6 h-6" aria-hidden="true" />
                            </button>
                        </div>

                        <!-- Links -->
                        <TabGroup as="div" class="mt-2">
                            <div class="border-b border-gray-200">
                                <TabList class="flex px-4 -mb-px space-x-8">
                                    <Tab as="template" v-for="department in navigation.categories"
                                        :key="department.name" v-slot="{ selected }">
                                        <button
                                            :class="[selected ? 'text-indigo-600 border-indigo-600' : 'text-gray-900 border-transparent', 'flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-medium']">
                                            {{ department.name }}
                                        </button>
                                    </Tab>
                                </TabList>
                            </div>
                            <TabPanels as="template">
                                <TabPanel v-for="(department, categoryIdx) in navigation.categories"
                                    :key="department.name" class="px-4 pt-10 pb-6 space-y-12">
                                    <div class="grid items-start grid-cols-1 gap-y-10 gap-x-6">
                                        <div class="grid grid-cols-1 gap-y-10 gap-x-6">
                                            <div>
                                                <p :id="`mobile-featured-heading-${categoryIdx}`"
                                                    class="font-medium text-gray-900">Featured</p>
                                                <ul role="list"
                                                    :aria-labelledby="`mobile-featured-heading-${categoryIdx}`"
                                                    class="mt-6 space-y-6">
                                                    <li v-for="item in department.featured" :key="item.name"
                                                        class="flex">
                                                        <a :href="item.slug" class="text-gray-500">
                                                            {{ item.name }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <p id="mobile-categories-heading" class="font-medium text-gray-900">
                                                    Categories</p>
                                                <ul role="list" aria-labelledby="mobile-categories-heading"
                                                    class="mt-6 space-y-6">
                                                    <li v-for="item in department.categories" :key="item.name"
                                                        class="flex">
                                                        <a :href="item.slug" class="text-gray-500">
                                                            {{ item.name }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 gap-y-10 gap-x-6">
                                            <div>
                                                <p id="mobile-collection-heading" class="font-medium text-gray-900">
                                                    Collection</p>
                                                <ul role="list" aria-labelledby="mobile-collection-heading"
                                                    class="mt-6 space-y-6">
                                                    <li v-for="item in department.collection" :key="item.name"
                                                        class="flex">
                                                        <a :href="item.slug" class="text-gray-500">
                                                            {{ item.name }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div>
                                                <p id="mobile-brand-heading" class="font-medium text-gray-900">Brands
                                                </p>
                                                <ul role="list" aria-labelledby="mobile-brand-heading"
                                                    class="mt-6 space-y-6">
                                                    <li v-for="item in department.brands" :key="item.name" class="flex">
                                                        <a :href="item.slug" class="text-gray-500">
                                                            {{ item.name }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </TabPanel>
                            </TabPanels>
                        </TabGroup>

                        <div class="px-4 py-6 space-y-6 border-t border-gray-200">
                            <div class="flow-root">
                                <a href="/register" class="block p-2 -m-2 font-medium text-gray-900">Create an
                                    account</a>
                            </div>
                            <div class="flow-root">
                                <a href="/dashboard" class="block p-2 -m-2 font-medium text-gray-900">Sign in</a>
                            </div>
                        </div>

                        <!-- Currency selector -->
                        <!-- <div class="px-4 py-6 space-y-6 border-t border-gray-200">
                <form>
                    <div class="inline-block">
                    <label for="mobile-currency" class="sr-only">Currency</label>
                    <div class="relative -ml-2 border-transparent rounded-md group focus-within:ring-2 focus-within:ring-white">
                        <select id="mobile-currency" name="currency" class="bg-none border-transparent rounded-md py-0.5 pl-2 pr-5 flex items-center text-sm font-medium text-gray-700 group-hover:text-gray-800 focus:outline-none focus:ring-0 focus:border-transparent">
                        <option v-for="currency in currencies" :key="currency">{{ currency }}</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" class="w-5 h-5 text-gray-500">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 8l4 4 4-4" />
                        </svg>
                        </div>
                    </div>
                    </div>
                </form>
                </div> -->
                    </div>
                </TransitionChild>
            </Dialog>
        </TransitionRoot>

        <!-- menu -->
        <header class="relative">
            <nav aria-label="Top">
                <!-- Top navigation -->
                <div class="bg-gray-900">
                    <div class="flex items-center justify-between h-10 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

                        <!-- Currency selector -->

                        <!-- <form class="hidden lg:block lg:flex-1">
                        <div class="flex">
                            <label for="desktop-currency" class="sr-only">Currency</label>
                            <div class="relative -ml-2 bg-gray-900 border-transparent rounded-md group focus-within:ring-2 focus-within:ring-white">
                            <select id="desktop-currency" name="currency" class="bg-none bg-gray-900 border-transparent rounded-md py-0.5 pl-2 pr-5 flex items-center text-sm font-medium text-white group-hover:text-gray-100 focus:outline-none focus:ring-0 focus:border-transparent">
                                <option v-for="currency in currencies" :key="currency">{{ currency }}</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" class="w-5 h-5 text-gray-300">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 8l4 4 4-4" />
                                </svg>
                            </div>
                            </div>
                        </div>
                        </form> -->

                        <p class="flex-1 text-sm font-medium text-center text-white lg:flex-none">Get free delivery on
                            orders over $100</p>

                        <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                            <a href="/register" class="text-sm font-medium text-white hover:text-gray-100">Create an
                                account</a>
                            <span class="w-px h-6 bg-gray-600" aria-hidden="true" />
                            <a href="/dashboard" class="text-sm font-medium text-white hover:text-gray-100">Sign in</a>
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
                                        <img class="w-auto h-8"
                                            src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600"
                                            alt="" />
                                    </a>
                                </div>

                                <div class="z-50 hidden h-full lg:flex">

                                    <!-- Mega menus -->

                                    <PopoverGroup class="ml-8">
                                        <div class="flex justify-center h-full space-x-8">
                                            <Popover v-for="(department) in navigation" :key="department.name"
                                                class="flex" v-slot="{ open }">
                                                <div class="relative flex">
                                                    <PopoverButton
                                                        :class="[open ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-700 hover:text-gray-800', 'relative z-10 flex items-center transition-colors ease-out duration-200 text-lg border-b-2 -mb-px pt-px']">
                                                        {{ department.name }}
                                                    </PopoverButton>
                                                </div>

                                                <transition enter-active-class="transition duration-200 ease-out"
                                                    enter-from-class="opacity-0" enter-to-class="opacity-100"
                                                    leave-active-class="transition duration-150 ease-in"
                                                    leave-from-class="opacity-100" leave-to-class="opacity-0">
                                                    <PopoverPanel
                                                        class="absolute inset-x-0 text-sm text-gray-500 top-full">
                                                        <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                                        <div class="absolute inset-0 bg-white shadow top-1/2"
                                                            aria-hidden="true" />

                                                        <div class="relative bg-white">
                                                            <div class="px-8 mx-auto max-w-7xl">
                                                                <div
                                                                    class="grid grid-cols-6 pt-8 pb-16 gap-y-10 gap-x-8">

                                                                    <!-- Categories -->

                                                                    <div v-for="category in department.categories"
                                                                        :key="category.name">
                                                                        <a :href="formatUrl(category.slug)"
                                                                            aria-hidden="true"
                                                                            class="flex my-1 text-lg text-gray-700">{{
                                                                                    category.name
                                                                            }}</a>

                                                                        <ul role="list"
                                                                            class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                                            <li v-for="sub_categories in category.sub_categories"
                                                                                :key="sub_categories.id" class="flex">
                                                                                <a :href="formatUrl(sub_categories.slug)"
                                                                                    class="font-medium text-gray-800 first-line:hover:text-gray-800">
                                                                                    {{ sub_categories.name }}
                                                                                </a>
                                                                            </li>
                                                                            <li class="flex">
                                                                                <a :href="formatUrl(category.slug)"
                                                                                    class="font-medium text-gray-700 first-line:hover:text-gray-800">
                                                                                    Shop all {{ category.name }} </a>
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

                                <!-- Mobile menu and search (lg-) -->
                                <div class="flex items-center flex-1 lg:hidden">
                                    <button type="button" class="p-2 -ml-2 text-gray-400 bg-white rounded-md"
                                        @click="open = true">
                                        <span class="sr-only">Open menu</span>
                                        <MenuIcon class="w-6 h-6" aria-hidden="true" />
                                    </button>

                                    <!-- Search -->
                                    <a href="#" class="p-2 ml-2 text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">Search</span>
                                        <SearchIcon class="w-6 h-6" aria-hidden="true" />
                                    </a>
                                </div>

                                <!-- Logo (lg-) -->
                                <a href="#" class="lg:hidden">
                                    <span class="sr-only">Workflow</span>
                                    <img src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600"
                                        alt="" class="w-auto h-8" />
                                </a>

                                <div class="flex items-center justify-end flex-1">
                                    <div class="flex items-center lg:ml-8">
                                        <div class="flex space-x-8">
                                            <div class="hidden lg:flex">
                                                <a href="search" class="p-2 -m-2 text-gray-400 hover:text-gray-500">
                                                    <span class="sr-only">Search</span>
                                                    <SearchIcon class="w-6 h-6" aria-hidden="true" />
                                                </a>
                                            </div>

                                            <div class="flex">
                                                <a href="dashboard" class="p-2 -m-2 text-gray-400 hover:text-gray-500">
                                                    <span class="sr-only">Account</span>
                                                    <UserIcon class="w-6 h-6" aria-hidden="true" />
                                                </a>
                                            </div>
                                        </div>

                                        <span class="w-px h-6 mx-4 bg-gray-200 lg:mx-6" aria-hidden="true" />

                                        <div class="flow-root">
                                            <a href="#" class="flex items-center p-2 -m-2 group">
                                                <ShoppingCartIcon
                                                    class="flex-shrink-0 w-6 h-6 text-gray-400 group-hover:text-gray-500"
                                                    aria-hidden="true" />
                                                <span
                                                    class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                                                <span class="sr-only">items in cart, view bag</span>
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
    </div>

    <component :is="componentName" :slug="componentProps" />

    <Footer />
</template>

<script>
import { ref } from 'vue'
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
} from '@headlessui/vue'
import { MenuIcon, QuestionMarkCircleIcon, SearchIcon, ShoppingBagIcon, XIcon, ShoppingCartIcon, UserIcon } from '@heroicons/vue/outline'

const currencies = ['CAD', 'USD', 'AUD', 'EUR', 'GBP']

const featuredCategories = [
    {
        name: "Women's",
        href: '#',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-04-collection-01.jpg',
        imageAlt: 'Woman wearing a comfortable cotton t-shirt.',
    },
    {
        name: "Men's",
        href: '#',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-04-collection-02.jpg',
        imageAlt: 'Man wearing a comfortable and casual cotton t-shirt.',
    },
    {
        name: 'Desk Accessories',
        href: '#',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-04-collection-03.jpg',
        imageAlt: 'Person sitting at a wooden desk with paper note organizer, pencil and tablet.',
    },
]

import axios from 'axios';
import { onMounted, computed } from 'vue';
import Footer from './components/Footer.vue';
import Home from './pages/Home.vue';
import Categories from './pages/Categories.vue';
import ProductDetails from './pages/ProductDetails.vue';

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
        ShoppingCartIcon, UserIcon,
        XIcon,
        Footer,
        Home,
        Categories,
        ProductDetails,
    },

    setup() {
        const open = ref(true);

        const currentPath = ref(window.location.hash)

        const componentName = ref('Home');

        const componentProps = ref('');

        const navigation = ref([]);

        window.addEventListener('hashchange', () => {
            currentPath.value = window.location.hash;

            if (currentPath.value.split("/")[1] === 'shop') {
                switchComponent('Categories', currentPath.value.split("/")[2]);
            } else {
                switchComponent('Home');
            }
        })


        function formatUrl(slug) {
            return `#/shop/${slug}`
        }

        function switchComponent(name, slug) {
            componentName.value = name
            componentProps.value = slug
            open.value = false
        }

        return {
            open,
            currencies,
            componentName,
            componentProps,
            featuredCategories,
            switchComponent,
            formatUrl,
        }
    },

    data() {
        return {
            navigation: [],
        }
    },
    methods: {
        get() {
            axios.get('/navigation').then(response => {
                console.log(response.data.data);
                this.navigation = response.data.data;
            });
        }
    },
    mounted() {
        this.get();
    },
}
</script>
