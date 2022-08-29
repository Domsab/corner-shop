<template>
    <div class="bg-white">
        <div>
            <main class="max-w-2xl px-4 mx-auto lg:max-w-7xl">
                <!-- Breadcrumb -->
                <Breadcrumb :departmentName="departmentName" :parentName="parentCategoryName"/>

                <div class="py-6 border-b border-gray-200">
                    <h1
                        class="text-4xl font-extrabold tracking-tight text-gray-900"
                    >
                       {{ departmentName }}'s {{ categoryName }} {{ parentCategoryName }}
                    </h1>
                    <p class="mt-4 text-base text-gray-500">
                        {{ categoryDescription }}
                    </p>
                </div>

                <div class="pt-12 pb-24 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
                    <!-- #todo:Filters -->
                    <aside>
                        <h2 class="sr-only">Filters</h2>

                        <button
                            type="button"
                            class="inline-flex items-center lg:hidden"
                            @click="mobileFiltersOpen = true"
                        >
                            <span class="text-sm font-medium text-gray-700"
                                >Filters</span
                            >
                            <PlusSmIcon
                                class="flex-shrink-0 w-5 h-5 ml-1 text-gray-400"
                                aria-hidden="true"
                            />
                        </button>

                        <div class="hidden lg:block">
                            <form class="space-y-10 divide-y divide-gray-200">
                                <div
                                    v-for="(section, sectionIdx) in filters"
                                    :key="section.name"
                                    :class="sectionIdx === 0 ? null : 'pt-10'"
                                >
                                    <fieldset>
                                        <legend
                                            class="block text-sm font-medium text-gray-900"
                                        >
                                            {{ section.name }}
                                        </legend>
                                        <div class="pt-6 space-y-3">
                                            <div
                                                v-for="(
                                                    option, optionIdx
                                                ) in section.options"
                                                :key="option.value"
                                                class="flex items-center"
                                            >
                                                <input
                                                    :id="`${section.id}-${optionIdx}`"
                                                    :name="`${section.id}[]`"
                                                    :value="option.value"
                                                    type="checkbox"
                                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                />
                                                <label
                                                    :for="`${section.id}-${optionIdx}`"
                                                    class="ml-3 text-sm text-gray-600"
                                                >
                                                    {{ option.label }}
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </form>
                        </div>
                    </aside>

                    <section
                        aria-labelledby="product-heading"
                        class="mt-6 lg:mt-0 lg:col-span-2 xl:col-span-3"
                    >
                        <h2 id="product-heading" class="sr-only">Products</h2>

                        <div
                            class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3"
                        >
                            <div
                                v-for="product in products"
                                :key="product.id"
                                class="relative flex flex-col overflow-hidden bg-white border border-gray-200 rounded-lg group"
                            >
                                <!-- <div
                                    class="bg-gray-200 aspect-w-3 aspect-h-4 group-hover:opacity-75 sm:aspect-none sm:h-96"
                                >
                                    <img
                                        :src="product.imageSrc"
                                        :alt="product.imageAlt"
                                        class="object-cover object-center w-full h-full sm:w-full sm:h-full"
                                    />
                                </div> -->
                                <div class="flex flex-col flex-1 p-4 space-y-2">
                                    <h3
                                        class="text-sm font-medium text-gray-900"
                                    >
                                        <router-link :to="`/shop/item/${product.slug}`">
                                            <span
                                                aria-hidden="true"
                                                class="absolute inset-0"
                                            />
                                            {{ product.name }}
                                        </router-link>
                                    </h3>
                                    <p class="text-sm text-gray-500">
                                        {{ product.description }}
                                    </p>
                                    <div
                                        class="flex flex-col justify-end flex-1"
                                    >
                                        <!-- <p class="text-sm italic text-gray-500">
                                            {{ product.options }}
                                        </p> -->
                                        <p
                                            class="text-base font-medium text-gray-900"
                                        >
                                            {{ product.price }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </main>
        </div>
    </div>
</template>

<script>
import {
    Dialog,
    DialogOverlay,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
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
    SearchIcon,
    ShoppingBagIcon,
    XIcon,
} from "@heroicons/vue/outline";

import { ChevronDownIcon, PlusSmIcon } from "@heroicons/vue/solid";

import { onMounted, ref, watch } from "vue";

import axios from "axios";

import { useRoute } from "vue-router";

import Breadcrumb from "../components/Breadcrumb.vue";

const filters = [
    {
        id: "category",
        name: "Category",
        options: [
            { value: "new-arrivals", label: "All New Arrivals" },
            { value: "tees", label: "Tees" },
            { value: "crewnecks", label: "Crewnecks" },
            { value: "sweatshirts", label: "Sweatshirts" },
            { value: "pants-shorts", label: "Pants & Shorts" },
        ],
    },
    {
        id: "color",
        name: "Color",
        options: [
            { value: "white", label: "White" },
            { value: "beige", label: "Beige" },
            { value: "blue", label: "Blue" },
            { value: "brown", label: "Brown" },
            { value: "green", label: "Green" },
            { value: "purple", label: "Purple" },
        ],
    },
    {
        id: "sizes",
        name: "Sizes",
        options: [
            { value: "xs", label: "XS" },
            { value: "s", label: "S" },
            { value: "m", label: "M" },
            { value: "l", label: "L" },
            { value: "xl", label: "XL" },
            { value: "2xl", label: "2XL" },
        ],
    },
];

// const products = [
//     {
//         id: 1,
//         name: "Basic Tee 8-Pack",
//         href: "#",
//         price: "$256",
//         description:
//             "Get the full lineup of our Basic Tees. Have a fresh shirt all week, and an extra for laundry day.",
//         options: "8 colors",
//         imageSrc:
//             "https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-01.jpg",
//         imageAlt:
//             "Eight shirts arranged on table in black, olive, grey, blue, white, red, mustard, and green.",
//     },
// ];

export default {
    components: {
        Dialog,
        DialogOverlay,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
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
        ChevronDownIcon,
        MenuIcon,
        PlusSmIcon,
        SearchIcon,
        ShoppingBagIcon,
        XIcon,
        Breadcrumb,
    },

    props: ["slug"],

    setup(props) {
        const mobileMenuOpen = ref(false);

        const mobileFiltersOpen = ref(false);

        const departmentName = ref("");

        const parentCategoryName = ref("");

        const parentCategoryDescription = ref("");

        const categoryName = ref("");

        const categoryDescription = ref("");

        const products = ref([]);

        const route = useRoute();

        onMounted(() => {
            getCatalogProducts();
        });

        watch(
            () => route.params,
            () => {
                getCatalogProducts();
            }
        );

        function getCatalogProducts() {
            axios.get(`/catalog/${route.params.slug}`)
                .then((response) => {
                    const data = response.data.data;
                    console.log("getCatalogProducts", data);

                    categoryName.value = data.category.name;
                    categoryDescription.value = data.category.description;
                    parentCategoryName.value = data.category.parent_name;
                    departmentName.value = data.category.department_name;

                    products.value = data.products;
                });
        }

        return {
            mobileMenuOpen,
            mobileFiltersOpen,
            departmentName,
            parentCategoryName,
            parentCategoryDescription,
            categoryName,
            categoryDescription,
            products,
            filters,
        };
    },
};
</script>
