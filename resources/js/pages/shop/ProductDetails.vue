<template>
    <div class="bg-white">
        <main class="max-w-2xl px-4 mx-auto lg:max-w-7xl">
            <!-- Breadcrumb -->
            <Breadcrumb
                :departmentName="departmentName"
                :parentName="parentName"
            />
            <div class="bg-white">
                <div
                    class="max-w-2xl px-4 py-16 mx-auto sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8"
                >
                    <div
                        class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start"
                    >
                        <!-- Image gallery -->
                        <TabGroup as="div" class="flex flex-col-reverse">
                            <!-- Image selector -->
                            <div
                                class="hidden w-full max-w-2xl mx-auto mt-6 sm:block lg:max-w-none"
                            >
                                <TabList class="grid grid-cols-4 gap-6">
                                    <Tab
                                        v-for="image in product.images"
                                        :key="image.id"
                                        class="relative flex items-center justify-center h-24 text-sm font-medium text-gray-900 uppercase bg-white rounded-md cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50"
                                        v-slot="{ selected }"
                                    >
                                        <span class="sr-only">
                                            {{ image.name }}
                                        </span>
                                        <span
                                            class="absolute inset-0 overflow-hidden rounded-md"
                                        >
                                            <img
                                                :src="image.src"
                                                alt=""
                                                class="object-cover object-center w-full h-full"
                                            />
                                        </span>
                                        <span
                                            :class="[
                                                selected
                                                    ? 'ring-indigo-500'
                                                    : 'ring-transparent',
                                                'absolute inset-0 rounded-md ring-2 ring-offset-2 pointer-events-none',
                                            ]"
                                            aria-hidden="true"
                                        />
                                    </Tab>
                                </TabList>
                            </div>

                            <TabPanels class="w-full aspect-w-1 aspect-h-1">
                                <TabPanel
                                    v-for="image in product.images"
                                    :key="image.id"
                                >
                                    <img
                                        :src="image.src"
                                        :alt="image.alt"
                                        class="object-cover object-center w-full h-full sm:rounded-lg"
                                    />
                                </TabPanel>
                            </TabPanels>
                        </TabGroup>

                        <!-- Product info -->
                        <div class="px-4 mt-10 sm:px-0 sm:mt-16 lg:mt-0">
                            <h1
                                class="text-3xl font-extrabold tracking-tight text-gray-900"
                            >
                                {{ product.name }}
                            </h1>

                            <div class="mt-3">
                                <h2 class="sr-only">Product information</h2>
                                <p class="text-3xl text-gray-900">
                                    {{ product.price }}
                                </p>
                            </div>

                            <!-- Reviews -->
                            <div class="mt-3">
                                <h3 class="sr-only">Reviews</h3>
                                <div class="flex items-center">
                                    <div class="flex items-center">
                                        <StarIcon
                                            v-for="rating in [0, 1, 2, 3, 4]"
                                            :key="rating"
                                            :class="[
                                                product.rating > rating
                                                    ? 'text-indigo-500'
                                                    : 'text-gray-300',
                                                'h-5 w-5 flex-shrink-0',
                                            ]"
                                            aria-hidden="true"
                                        />
                                    </div>
                                    <p class="sr-only">
                                        {{ product.rating }} out of 5 stars
                                    </p>
                                </div>
                            </div>

                            <div class="mt-6">
                                <h3 class="sr-only">Description</h3>

                                <div
                                    class="space-y-6 text-base text-gray-700"
                                    v-html="product.description"
                                />
                            </div>

                            <div class="mt-6">
                                <!-- Colors -->
                                <div>
                                    <h3 class="text-sm text-gray-600">Color</h3>

                                    <RadioGroup
                                        v-model="selectedColor"
                                        class="mt-2"
                                    >
                                        <RadioGroupLabel class="sr-only">
                                            Choose a color
                                        </RadioGroupLabel>
                                        <div
                                            class="flex items-center space-x-3"
                                        >
                                            <RadioGroupOption
                                                as="template"
                                                v-for="color in product.colors"
                                                :key="color.name"
                                                :value="color"
                                                v-slot="{ active, checked }"
                                            >
                                                <div
                                                    :class="[
                                                        color.selectedColor,
                                                        active && checked
                                                            ? 'ring ring-offset-1'
                                                            : '',
                                                        !active && checked
                                                            ? 'ring-2'
                                                            : '',
                                                        '-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none',
                                                    ]"
                                                >
                                                    <RadioGroupLabel
                                                        as="p"
                                                        class="sr-only"
                                                    >
                                                        {{ color.name }}
                                                    </RadioGroupLabel>
                                                    <span
                                                        aria-hidden="true"
                                                        :class="[
                                                            color.bgColor,
                                                            'h-8 w-8 border border-black border-opacity-10 rounded-full',
                                                        ]"
                                                    />
                                                </div>
                                            </RadioGroupOption>
                                        </div>
                                    </RadioGroup>
                                </div>

                                <div class="flex mt-10 sm:flex-col1">
                                    <button
                                        class="flex items-center justify-center flex-1 max-w-xs px-8 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500 sm:w-full"
                                        @click="addItemToBag"
                                    >
                                        Add to bag
                                    </button>

                                    <button
                                        type="button"
                                        class="flex items-center justify-center px-3 py-3 ml-4 text-gray-400 rounded-md hover:bg-gray-100 hover:text-gray-500"
                                    >
                                        <HeartIcon
                                            class="flex-shrink-0 w-6 h-6"
                                            aria-hidden="true"
                                        />
                                        <span class="sr-only"
                                            >Add to favorites</span
                                        >
                                    </button>
                                </div>
                            </div>

                            <section
                                aria-labelledby="details-heading"
                                class="mt-12"
                            >
                                <h2 id="details-heading" class="sr-only">
                                    Additional details
                                </h2>

                                <div class="border-t divide-y divide-gray-200">
                                    <Disclosure
                                        as="div"
                                        v-for="detail in product.details"
                                        :key="detail.name"
                                        v-slot="{ open }"
                                    >
                                        <h3>
                                            <DisclosureButton
                                                class="relative flex items-center justify-between w-full py-6 text-left group"
                                            >
                                                <span
                                                    :class="[
                                                        open
                                                            ? 'text-indigo-600'
                                                            : 'text-gray-900',
                                                        'text-sm font-medium',
                                                    ]"
                                                >
                                                    {{ detail.name }}
                                                </span>
                                                <span
                                                    class="flex items-center ml-6"
                                                >
                                                    <PlusSmIcon
                                                        v-if="!open"
                                                        class="block w-6 h-6 text-gray-400 group-hover:text-gray-500"
                                                        aria-hidden="true"
                                                    />
                                                    <MinusSmIcon
                                                        v-else
                                                        class="block w-6 h-6 text-indigo-400 group-hover:text-indigo-500"
                                                        aria-hidden="true"
                                                    />
                                                </span>
                                            </DisclosureButton>
                                        </h3>
                                        <DisclosurePanel
                                            as="div"
                                            class="pb-6 prose-sm prose"
                                        >
                                            <ul role="list">
                                                <li
                                                    v-for="item in detail.items"
                                                    :key="item"
                                                >
                                                    {{ item }}
                                                </li>
                                            </ul>
                                        </DisclosurePanel>
                                    </Disclosure>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>

import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    RadioGroup,
    RadioGroupLabel,
    RadioGroupOption,
    Tab,
    TabGroup,
    TabList,
    TabPanel,
    TabPanels,
} from "@headlessui/vue"
import { HeartIcon, MinusSmIcon, PlusSmIcon } from "@heroicons/vue/outline"
import { StarIcon } from "@heroicons/vue/solid"

import { onMounted, ref, watch } from "vue"
import { useRoute } from "vue-router"
import { useShoppingCartStore } from "../stores/shopping-cart"
import axios from "axios"

import Breadcrumb from "../components/Breadcrumb.vue"

const product = {
    name: "Zip Tote Basket",
    price: "$140",
    rating: 4,
    images: [
        {
            id: 1,
            name: "Angled view",
            src: "https://tailwindui.com/img/ecommerce-images/product-page-03-product-01.jpg",
            alt: "Angled front view with bag zipped and handles upright.",
        },
        // More images...
    ],
    colors: [
        {
            name: "Washed Black",
            bgColor: "bg-gray-700",
            selectedColor: "ring-gray-700",
        },
        { name: "White", bgColor: "bg-white", selectedColor: "ring-gray-400" },
        {
            name: "Washed Gray",
            bgColor: "bg-gray-500",
            selectedColor: "ring-gray-500",
        },
    ],
    description: `
    <p>The Zip Tote Basket is the perfect midpoint between shopping tote and comfy backpack. With convertible straps, you can hand carry, should sling, or backpack this convenient and spacious bag. The zip top and durable canvas construction keeps your goods protected for all-day use.</p>
  `,
    details: [
        {
            name: "Features",
            items: [
                "Multiple strap configurations",
                "Spacious interior with top zip",
                "Leather handle and tabs",
                "Interior dividers",
                "Stainless strap loops",
                "Double stitched construction",
                "Water-resistant",
            ],
        },
        // More sections...
    ],
}

export default {
    components: {
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        RadioGroup,
        RadioGroupLabel,
        RadioGroupOption,
        Tab,
        TabGroup,
        TabList,
        TabPanel,
        TabPanels,
        HeartIcon,
        MinusSmIcon,
        PlusSmIcon,
        StarIcon,
        Breadcrumb,
    },
    setup() {
        const route = useRoute();

        const shoppingBag = useShoppingCartStore();

        // const selectedColor = ref(product.colors[0]);

        const product = ref([]);

        const departmentName = ref('');

        const parentName = ref('');


        onMounted(() => {
            getProduct();
        });

        watch(
            () => route.params,
            () => {
                getProduct()
            }
        )

        function addItemToBag(){
            shoppingBag.addItem(this.product.id)
        }

        function getProduct() {
            axios.get(`/products/${route.params.slug}`).then((response) => {
                console.log('Product', response.data.data)

                const data = response.data.data

                product.value = data

                departmentName.value = data.categories[0].department_name

                parentName.value = data.categories[0].parent_name
            })
        }

        return {
            product,
            departmentName,
            parentName,
            addItemToBag,
            // selectedColor,
        }
    },
}
</script>
