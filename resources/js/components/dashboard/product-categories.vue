<template>
    <form>
        <div class="grid grid-cols-4 gap-6 mt-6">
            <div class="col-span-2">
                <div>
                    <label
                        for="product-name"
                        class="block text-sm font-medium text-gray-700"
                    >
                        Filter By Department
                    </label>
                    <select
                        v-model="selected_department"
                        id="department"
                        name="department"
                        class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                        <option selected>Please select</option>
                        <option
                            v-for="department in departments"
                            :value="department"
                        >
                            {{ department.name }}
                        </option>
                    </select>
                </div>

                <div class="mt-6">
                    <label
                        for="category"
                        class="block text-sm font-medium text-gray-700"
                        >Categories</label
                    >
                    <select
                        v-model="selected_categories"
                        id="category"
                        name="category"
                        multiple
                        size="4"
                        class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                        <option
                            v-if="categories.length > 0"
                            v-for="category in categories"
                            :value="category"
                        >
                            {{ category.name }}
                        </option>
                        <option v-else>Please select a department first</option>
                    </select>
                </div>
                <div class="mt-2">
                    <button
                        @click="addCategory"
                        type="button"
                        class="w-full px-4 py-2 text-base font-medium text-white align-bottom bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto sm:text-sm"
                    >
                        Add Category
                    </button>
                </div>
            </div>

            <div class="col-span-2">
                <div>
                    <label
                        for="product-name"
                        class="block text-sm font-medium text-gray-700"
                    >
                        Filter By Category
                    </label>
                    <select
                        v-model="selected_categories"
                        id="department"
                        name="department"
                        class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                        <option selected>Please select a department</option>
                        <option
                            v-for="category in categories"
                            :value="category"
                        >
                            {{ category.name }}
                        </option>
                    </select>
                </div>

                <div class="mt-6">
                    <label
                        for="sub-category"
                        class="block text-sm font-medium text-gray-700"
                        >Sub Categories</label
                    >
                    <select
                        v-model="selected_sub_categories"
                        id="sub-category"
                        name="sub-category"
                        multiple
                        size="4"
                        class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                        <option selected>Please select a category first</option>
                        <option v-for="category in sub_categories">
                            {{ category.name }}
                        </option>
                    </select>
                </div>

                <div class="mt-2">
                    <button
                        @click="addSubCategory"
                        type="button"
                        class="w-full px-4 py-2 text-base font-medium text-white align-bottom bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto sm:text-sm"
                    >
                        Add Sub Category
                    </button>
                </div>
            </div>

            <div class="col-span-4">
                <p class="block my-4 text-sm font-medium text-gray-700">
                    Selected Categories
                </p>
                <span
                    v-for="categories in form.categories"
                    class="bg-green-100 text-green-800 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium capitalize p-4 mr-4"
                >
                    {{ categories.slug }}
                    <span class="ml-2" @click="removeCategory(categories.id)"
                        >x</span
                    >
                </span>
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
            categories: [],
            sub_categories: [],
            selected_department: [],
            selected_categories: [],
            selected_sub_category: [],
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
                categories: [],
                sub_categories: [],
            },
        };
    },
    watch: {
        selected_department(newValue) {
            // this.form.categories.department_id = newValue.id;
            console.log("set_categories", newValue.categories);
            this.categories = newValue.categories;
        },

        selected_categories(newValue) {
            // this.form.category.parent_id = newValue.id;
            console.log("selected_categories", newValue);
            this.sub_categories = newValue.sub_categories;
        },

        selected_sub_category(newValue) {
            // this.form.sub_category.id = newValue.id;
            console.log("selected_category", newValue);
            // this.categories = newValue.sub_categories;
        },
    },
    methods: {
        submit() {
            this.$emit("submitForm", this.form);
        },

        addCategory() {
            console.log("selected_categories", this.selected_categories);

            this.selected_categories.forEach((category) => {
                // this.form.categories.find(
                //     (existing) => existing.id === category.id
                // );

                this.form.categories.push({
                    id: category.id,
                    slug: category.slug,
                });
            });
        },

        addSubCategory() {
            console.log(
                "selected_sub_categories",
                this.selected_sub_categories
            );

            this.selected_sub_categories.forEach((category) => {
                // this.form.categories.find(
                //     (existing) => existing.id === category.id
                // );

                this.form.categories.push({
                    id: category.id,
                    slug: category.slug,
                    parent_id: category.parent_id,
                });
            });
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

    mounted() {},
};
</script>
