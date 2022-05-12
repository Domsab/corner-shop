<template>
    <form>
        <div class="grid grid-cols-4 gap-6 mt-6">
            <div class="col-span-3 sm:col-span-3">
                <label
                    for="product-name"
                    class="block text-sm font-medium text-gray-700"
                >
                    Product Name
                </label>
                <input
                    v-model="form.name"
                    type="text"
                    name="product-name"
                    id="product-name"
                    autocomplete="cc-family-name"
                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                />
            </div>

            <div class="col-span-1 sm:col-span-1">
                <label
                    for="sku"
                    class="block text-sm font-medium text-gray-700"
                >
                    SKU
                </label>
                <input
                    v-model="form.sku"
                    type="text"
                    name="sku"
                    id="sku"
                    autocomplete="cc-family-name"
                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                />
            </div>

            <div class="col-span-1 sm:col-span-1">
                <label
                    for="price"
                    class="block text-sm font-medium text-gray-700"
                >
                    Price
                </label>
                <input
                    v-model="form.price"
                    type="text"
                    name="price"
                    id="price"
                    autocomplete="cc-family-name"
                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                />
            </div>

            <div class="col-span-1 sm:col-span-1">
                <label
                    for="discount-price"
                    class="block text-sm font-medium text-gray-700"
                >
                    Discount Price
                </label>
                <input
                    v-model="form.discount_price"
                    type="text"
                    name="discount-price"
                    id="discount-price"
                    autocomplete="cc-family-name"
                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                />
            </div>

            <div class="col-span-1 sm:col-span-1">
                <label
                    for="quantity"
                    class="block text-sm font-medium text-gray-700"
                >
                    Quantity
                </label>
                <input
                    v-model="form.quantity"
                    type="text"
                    name="quantity"
                    id="quantity"
                    autocomplete="cc-family-name"
                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                />
            </div>

            <div class="col-span-1 sm:col-span-1">
                <label
                    for="weight"
                    class="block text-sm font-medium text-gray-700"
                >
                    Weight
                </label>
                <input
                    v-model="form.weight"
                    type="text"
                    name="weight"
                    id="weight"
                    autocomplete="cc-family-name"
                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                />
            </div>

            <div class="sm:col-span-4">
                <label
                    for="description"
                    class="block text-sm font-medium text-blue-gray-900"
                >
                    Description
                </label>
                <div class="mt-1">
                    <textarea
                        v-model="form.description"
                        id="description"
                        name="description"
                        rows="4"
                        class="block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>
            </div>

            <div class="col-span-2">
                <fieldset>
                    <div class="relative flex items-start mt-2">
                        <div class="flex items-center h-5">
                            <input
                                v-model="form.status"
                                id="status"
                                aria-describedby="status-description"
                                name="status"
                                type="checkbox"
                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                            />
                        </div>
                        <div class="ml-3 text-sm">
                            <label
                                for="status"
                                class="font-medium text-gray-700"
                            >
                                Status
                            </label>
                            <p id="status-description" class="text-gray-500">
                                Is this product available for purchase.
                            </p>
                        </div>
                    </div>

                    <div class="relative flex items-start mt-2">
                        <div class="flex items-center h-5">
                            <input
                                v-model="form.featured"
                                id="featured"
                                aria-describedby="featured-description"
                                name="featured"
                                type="checkbox"
                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                            />
                        </div>
                        <div class="ml-3 text-sm">
                            <label
                                for="featured"
                                class="font-medium text-gray-700"
                            >
                                Featured Homepage
                            </label>
                            <p id="featured-description" class="text-gray-500">
                                Product will appear on featured sections.
                            </p>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="col-span-4">
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <button
                        @click="submit"
                        type="button"
                        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                    >
                        Save
                    </button>
                    <button
                        @click="$emit('close')"
                        type="button"
                        class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                        ref="cancelButtonRef"
                    >
                        Close
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
import selectMenu from "../../components/form/select-menu.vue";

import {
    CheckCircleIcon,
    XCircleIcon,
    TrashIcon,
    PencilIcon,
} from "@heroicons/vue/solid";

import axios from "axios";

export default {
    name: "Product Details",

    components: {
        selectMenu,
    },

    props: {
        product: {
            type: Array,
            default: [],
        },
        departments: {
            type: Array,
            default: [],
        },
    },

    data() {
        return {
            department: [],
            parent_categories: [],
            categories: [],
            selected_department: [],
            selected_parent_category: [],
            selected_category: [],
            form: {
                id: "",
                name: "",
                sku: "",
                price: "",
                discount_price: "",
                quantity: "0",
                weight: "",
                description: "",
                status: "",
                featured: "",
                categories: {
                    'id': '',
                    'name': '',
                    'parent_id': '',
                    'parent_name': '',
                    'department_id': '',
                    'department_name': '',
                }
            },
        };
    },
    watch: {
        'selected_department'(newValue) {
            this.form.category.department_id = newValue.id
            this.categories = newValue.categories;
        },

        'selected_parent_category'(newValue) {
            this.form.category.parent_id = newValue.id
            console.log('selected_parent_category', newValue);
            this.categories = newValue.sub_categories;
        },

        'selected_category'(newValue) {
            this.form.category.id = newValue.id
            console.log('selected_category', newValue);
            // this.categories = newValue.sub_categories;
        },
    },
    methods: {
        submit() {
            this.$emit("submitForm", this.form)
        },

        // setDepartment(department) {
        //     this.form.category.department_id = department.id;

        //     this.categories = department.categories;
        //     console.log('setDepartment()',this.categories);
        // },

        // setParentCategory(category) {
        //     this.form.category.parent_id = category.id;

        //     this.sub_categories = category.sub_categories;
        //     console.log('setParentCategory()',this.sub_categories);
        // },

        // setCategory(sub_categories) {
        //     this.form.category.id = sub_categories.id;
        // },
    },

    mounted() {
        console.log('Mounted product', this.product);
        this.form = this.product;
    },
};
</script>
