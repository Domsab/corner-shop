<template>
    <main class="flex-1">
        <!-- Page Header -->
        <div class="bg-white shadow">
            <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                <div
                    class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200"
                >
                    <div class="flex-1 min-w-0">
                        <!-- Profile -->
                        <div class="flex items-center">
                            <img
                                class="hidden w-16 h-16 rounded-full sm:block"
                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.6&w=256&h=256&q=80"
                                alt=""
                            />
                            <div>
                                <div class="flex items-center">
                                    <img
                                        class="w-16 h-16 rounded-full sm:hidden"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.6&w=256&h=256&q=80"
                                        alt=""
                                    />
                                    <h1
                                        class="ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate"
                                    >
                                        Products
                                    </h1>
                                </div>
                                <dl
                                    class="flex flex-col mt-6 sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap"
                                >
                                    <dt class="sr-only">Account status</dt>
                                    <dd
                                        class="flex items-center mt-3 text-sm font-medium text-gray-500 capitalize sm:mr-6 sm:mt-0"
                                    >
                                        <CheckCircleIcon
                                            class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                            aria-hidden="true"
                                        />
                                        A list of products
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="flex mt-6 space-x-3 md:mt-0 md:ml-4">
                        <button
                            @click="showCreateModal"
                            type="button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                        >
                            Create Product
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Department tabs -->
        <div
            class="px-4 mt-8 first-line:mt-8 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8"
        >
            <div class="hidden lg:block">
                <div class="border-b border-gray-200">
                    <nav class="flex -mb-px space-x-8">
                        <a
                            v-for="department in departments"
                            :key="department.name"
                            :href="department.href"
                            @click="setData(department)"
                            :class="[
                                tabs.active === department.name
                                    ? 'border-purple-500 text-purple-600'
                                    : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700',
                                'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm',
                            ]"
                            >{{ department.name }}</a
                        >
                        <a
                            :class="[
                                tabs.active === 'all'
                                    ? 'border-purple-500 text-purple-600'
                                    : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700',
                                'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm',
                            ]"
                            >All</a
                        >
                    </nav>
                </div>
            </div>
        </div>

        <div
            class="px-4 mt-8 first-line:mt-8 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8"
        >
            <!-- Tab Content -->
            <div class="grid grid-cols-9 gap-5 my-4">
                <!-- Tab Description -->
                <div class="col-span-6 bg-white">
                    <div class="overflow-hidden">
                        <div class="p-5">
                            <div class="flex flex-wrap items-center">
                                <div class="flex-1 w-full">
                                    <dl>
                                        <dt
                                            class="text-sm font-medium text-gray-500 truncate"
                                        >
                                            Department Name:
                                        </dt>
                                        <dd>
                                            <div
                                                class="text-lg font-medium text-gray-900"
                                            >
                                                {{ getDepartmentName }}
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="flex flex-wrap items-center pt-3">
                                <div class="flex-1 w-full">
                                    <dl>
                                        <dt
                                            class="text-sm font-medium text-gray-500 truncate"
                                        >
                                            Description:
                                        </dt>
                                        <dd>
                                            <div
                                                class="text-lg font-medium text-gray-900"
                                            >
                                                {{ getDepartmentDescription }}
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions Card -->
                <div class="col-span-3">
                    <div class="overflow-hidden bg-white rounded-lg shadow">
                        <div class="overflow-hidden">
                            <div class="p-5">
                                <div class="flex flex-wrap items-center pt-3">
                                    <div class="flex-1 w-0">
                                        <dl>
                                            <dt
                                                class="text-sm font-medium text-gray-500 truncate"
                                            >
                                                Filter By Category:
                                            </dt>
                                            <dd>
                                                <div
                                                    class="text-lg font-medium text-gray-900"
                                                >
                                                    {15}
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>

                                <div class="flex flex-wrap items-center pt-3">
                                    <div class="flex-1 w-0">
                                        <dl>
                                            <dt
                                                class="text-sm font-medium text-gray-500 truncate"
                                            >
                                                Filter By Sub Category:
                                            </dt>
                                            <dd>
                                                <div
                                                    class="text-lg font-medium text-gray-900"
                                                >
                                                    {15}
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>

                                <div class="flex flex-wrap items-center pt-3">
                                    <div class="flex-1 w-0">
                                        <dl>
                                            <dt
                                                class="text-sm font-medium text-gray-500 truncate"
                                            >
                                                Related Products:
                                            </dt>
                                            <dd>
                                                <div
                                                    class="text-lg font-medium text-gray-900"
                                                >
                                                    {15}
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>

                                <div class="flex flex-wrap items-center pt-3">
                                    <div class="flex-1 w-full mb-3">
                                        <button
                                            type="button"
                                            @click="showDeleteModal()"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 shadow-sm rounded-l-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                                        >
                                            <TrashIcon
                                                class="w-4 h-6 text-red-600"
                                                aria-hidden="true"
                                            />
                                        </button>

                                        <button
                                            type="button"
                                            @click="showEditDepartmentModal()"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 shadow-sm rounded-r-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                                        >
                                            <PencilIcon
                                                class="w-4 h-6 text-blue-600"
                                                aria-hidden="true"
                                            />
                                        </button>
                                        <span class="px-1" />
                                        <button
                                            @click="showCategoryModal()"
                                            type="button"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                                        >
                                            <PlusCircleIcon
                                                class="w-4 h-6 text-blue-600"
                                                aria-hidden="true"
                                            />
                                            <span span class="pl-2">
                                                Create Category
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products table -->
            <div class="block">
                <div class="flex flex-col mt-2">
                    <div
                        class="min-w-full overflow-hidden overflow-x-auto align-middle shadow sm:rounded-lg"
                    >
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        #
                                    </th>
                                    <th
                                        class="hidden px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:block"
                                    >
                                        Name
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        Category
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        Collections
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        Quantity
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        Price
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    ></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr
                                    v-for="product in products"
                                    :key="product.id"
                                    class="bg-white"
                                >
                                    <td
                                        class="px-6 py-4 text-sm text-gray-900 max-w-0 whitespace-nowrap"
                                    >
                                        <p
                                            class="text-gray-500 truncate group-hover:text-gray-900"
                                        >
                                            {{ product.id }}
                                        </p>
                                    </td>
                                    <td
                                        class="w-full px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        {{ product.name }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        {{ product.category.parent_name }} / {{ product.category.name }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        {{ product.categories }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        {{ product.quantity }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        {{ product.price }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        {{ product.status }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        <span
                                            class="relative z-0 inline-flex rounded-md shadow-sm"
                                        >
                                            <button
                                                type="button"
                                                @click="showEditModal(product)"
                                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                                            >
                                                <PencilIcon
                                                    class="w-4 h-6 text-blue-600"
                                                    aria-hidden="true"
                                                />
                                            </button>
                                            <button
                                                type="button"
                                                @click="showDeleteModal(product)"
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                                            >
                                                <TrashIcon
                                                    class="w-4 h-6 text-red-600"
                                                    aria-hidden="true"
                                                />
                                            </button>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        <nav
                            class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200 sm:px-6"
                            aria-label="Pagination"
                        >
                            <div class="hidden sm:block">
                                <p class="text-sm text-gray-700">
                                    Showing
                                    {{ " " }}
                                    <span class="font-medium">1</span>
                                    {{ " " }}
                                    to
                                    {{ " " }}
                                    <span class="font-medium">10</span>
                                    {{ " " }}
                                    of
                                    {{ " " }}
                                    <span class="font-medium">20</span>
                                    {{ " " }}
                                    results
                                </p>
                            </div>
                            <div
                                class="flex justify-between flex-1 sm:justify-end"
                            >
                                <a
                                    href="#"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50"
                                >
                                    Previous
                                </a>
                                <a
                                    href="#"
                                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50"
                                >
                                    Next
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <Modal
            :show="modal.show"
            :tabs="modal.tabs"
            :activeTab="modal.activeTab"
            :showButtons="false"
            @switchModalComponents="switchModalComponents"
            @close="modal.show = false"
        >
            <template #header>
                <div>
                    <h2
                        id="payment-details-heading"
                        class="text-lg font-medium leading-6 text-gray-900"
                    >
                        {{ modal.labels.header }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">
                        {{ modal.labels.sub_header }}
                    </p>
                </div>
            </template>

            <template #body>
                <component
                    :is="modal.active_component"
                    :product="product_data"
                    :departments="departments"
                    @submitForm="save"
                    @close="modal.show = false"
                />
            </template>
        </Modal>
    </main>
</template>

<script>
import {
    CheckCircleIcon,
    TrashIcon,
    PencilIcon,
    ChevronRightIcon,
    CashIcon,
} from "@heroicons/vue/solid";

import axios from "axios";
import Modal from "../../components/Modal.vue";
import selectMenu from "../../components/form/select-menu.vue";

import productDetails from "../../components/dashboard/product-details.vue";
import productCategories from "../../components/dashboard/product-categories.vue";
import productAttributes from "../../components/dashboard/product-attributes.vue";
import productImages from "../../components/dashboard/product-images.vue";

export default {
    components: {
        TrashIcon,
        PencilIcon,
        CashIcon,
        ChevronRightIcon,
        CheckCircleIcon,
        Modal,
        productImages,
        productDetails,
        productAttributes,
        productCategories,
        selectMenu,
    },

    computed: {
        departmentOptions() {},

        categoryOptions() {},

        getDepartmentName() {
            return this.department.name;
        },

        getDepartmentDescription() {
            return this.department.description;
        },
    },

    data() {
        return {
            products: [],
            product_data: [],
            departments: [],
            tabs: {
                active: "",
                description: "",
            },
            department: {
                id: "",
                name: "",
                description: "",
            },
            modal: {
                show: false,
                active_component: "productDetails",
                activeTab: "General",
                action: "",
                labels: {
                    header: "Header",
                    sub_header: "SubHeader",
                },
                tabs: [
                    {
                        name: "General",
                        href: "#",
                        component: "productDetails",
                        description: "Update your product details.",
                    },
                    {
                        name: "Categories",
                        href: "#",
                        component: "productCategories",
                        description: "Assign product categories.",
                    },
                    {
                        name: "Images",
                        href: "#",
                        component: "productImages",
                        description: "Images appear on each product page.",
                    },
                    {
                        name: "Attributes",
                        href: "#",
                        component: "productAttributes",
                        description: "Select an attribute to modify its values for this product.",
                    },
                ],
            },
        };
    },

    methods: {
        showCreateModal() {
            this.modal.labels.header = "Create Product";
            this.modal.labels.cancel_btn = "Create Product";
            this.modal.labels.save_btn = "Create Product";

            this.product_data = [];

            this.modal.show = true;
        },

        showEditModal(product) {
            this.modal.labels.header = "Create Product";
            this.modal.labels.cancel_btn = "Create Product";
            this.modal.labels.save_btn = "Create Product";

            console.log('showEditModal', product);

            this.product_data = product;

            this.modal.show = true;
        },

        showDeleteModal(product) {

        },

        switchModalComponents(tab) {
            console.log(tab);
            this.modal.activeTab = tab.name;

            this.modal.active_component = tab.component;

            this.modal.labels.header = tab.name;

            this.modal.labels.sub_header = tab.description;
        },

        setData(department) {
            console.log("setData", department);

            this.tabs.active = department.name;

            this.department.id = department.id;

            this.department.name = department.name;

            this.department.description = department.description;

            this.categories = department.categories;

            this.getProductData();
        },

        getData() {
            axios.get("/dashboard/departments").then((response) => {
                this.departments = response.data.data;

                this.setData(this.departments[0]);
            });
        },

        getProductData() {
            axios.get(`/dashboard/departments/${this.department.id}/products`)
                .then((response) => {
                    this.products = response.data.data;
                });
        },

        save(formData) {
            console.log("save", formData);

            axios
                .post(`/dashboard/products/${formData.id}`, formData)
                .then((response) => {
                    this.product_data = response.data.data;

                    console.log(this.product_data);

                    this.modal.labels.header = "Edit Product";
                    this.modal.labels.cancel_btn = "Create Product";
                    this.modal.labels.save_btn = "Create Product";

                    this.modal.show = true;
                });
        },
    },

    mounted() {
        this.getData();
    },
};
</script>
