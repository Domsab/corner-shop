<template>

    <main class="flex-1">

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
                                        Departments &amp; Categories
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
                                        A list of categories
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="flex mt-6 space-x-3 md:mt-0 md:ml-4">
                        <button
                            @click="showDepartmentModal()"
                            type="button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                        >
                            Add Department
                        </button>
                    </div>
                    <div class="flex mt-6 space-x-3 md:mt-0 md:ml-4">
                        <button
                            @click="showCategoryModal()"
                            type="button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                        >
                            Add Category
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 mt-8 first-line:mt-8 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
            <div class="hidden lg:block">
                <div class="border-b border-gray-200">
                    <nav class="flex -mb-px space-x-8">
                        <a
                            v-for="department in departments"
                            :key="department.name"
                            :href="department.href"
                            @click="setDepartment(department)"
                            :class="[tab.active === department.name ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700', 'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm']"
                        >{{ department.name }}</a>
                    </nav>
                </div>
            </div>
        </div>

        <div class="px-4 mt-8 first-line:mt-8 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
            <h2 class="text-lg font-medium leading-6 text-gray-900">
                {{ tab.description }}
            </h2>
            <button title="Edit category" @click="showEditDepartmentModal(department)" type="button" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                <PencilIcon class="w-4 h-6 text-blue-600" aria-hidden="true"/>
            </button>

            <div class="block">
                <div class="flex flex-col mt-2">
                    <div class="min-w-full overflow-hidden overflow-x-auto align-middle shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        #
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        Name
                                    </th>
                                    <th
                                        class="hidden px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:block"
                                    >
                                        Slug
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        Featured
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        Menu
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        Order
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Categories -->
                                <template v-for="category in categories" :key="category.id">
                                    <tr  class="bg-white">
                                        <td class="px-6 py-4 text-sm text-gray-900 max-w-0 whitespace-nowrap">
                                            <div class="flex">
                                                <p class="text-gray-500 truncate group-hover:text-gray-900"> {{ category.id}} </p>
                                            </div>
                                        </td>
                                        <td class="w-full px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                            {{ category.name}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                            {{ category.slug}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                            {{ category.featured}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                            {{ category.menu}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                            {{ category.order}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                            <span class="relative z-0 inline-flex rounded-md shadow-sm">

                                                <button title="Edit category" @click="showEditCategoryModal(category)" type="button" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                    <PencilIcon class="w-4 h-6 text-blue-600" aria-hidden="true"/>
                                                </button>

                                                <button title="Add a child category" @click="showSubCategoryModal(category)" type="button" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                    <PlusCircleIcon class="w-4 h-6 text-blue-600" aria-hidden="true"/>
                                                </button>

                                                <button title="Delete category" @click="deleteCategory(category)" type="button" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                    <TrashIcon class="w-4 h-6 text-red-600" aria-hidden="true"/>
                                                </button>

                                            </span>
                                        </td>
                                    </tr>

                                    <template v-if="category.sub_categories.length >= 1">
                                        <tr v-for="sub_category in category.sub_categories" :key="sub_category.id" class="bg-yellow">
                                            <td class="px-6 py-4 text-sm text-gray-900 max-w-0 whitespace-nowrap">
                                                <div class="flex">
                                                    <p class="text-gray-500 truncate group-hover:text-gray-900"> {{ sub_category.id}} </p>
                                                </div>
                                            </td>
                                            <td class="w-full px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                                >> {{ sub_category.name}}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                                {{ sub_category.slug}}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                                {{ sub_category.featured}}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                                {{ sub_category.menu}}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                                {{ sub_category.order}}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                                <span class="relative z-0 inline-flex rounded-md shadow-sm">

                                                    <button title="Edit sub_category" @click="showEditSubCategoryModal(sub_category)" type="button" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                        <PencilIcon class="w-4 h-6 text-blue-600" aria-hidden="true"/>
                                                    </button>

                                                    <button title="Delete sub_category" @click="deleteCategory(sub_category)" type="button" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                        <TrashIcon class="w-4 h-6 text-red-600" aria-hidden="true"/>
                                                    </button>

                                                </span>
                                            </td>
                                        </tr>
                                    </template>
                                </template>

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

        <Modal :show="modal.show" :showButtons="false" @close="modal.show = false">
            <template #header>
                <div>
                    <h2 id="payment-details-heading" class="text-lg font-medium leading-6 text-gray-900"> {{ modal.labels.header }}</h2>
                    <p class="mt-1 text-sm text-gray-500"> {{ modal.labels.subHeader }} </p>
                </div>
            </template>

            <template #body>
                <div v-if="modal.action == 'department'">
                    <div class="grid grid-cols-4 gap-6 mt-6">
                        <div class="col-span-4 sm:col-span-4">
                            <label for="last-name" class="block text-sm font-medium text-gray-700"> Name </label>
                            <input v-model="form.department.name" type="text" name="last-name" id="last-name" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
                        </div>

                        <div class="sm:col-span-4">
                            <label for="description" class="block text-sm font-medium text-blue-gray-900"> Description </label>
                            <div class="mt-1">
                                <textarea v-model="form.department.description" id="description" name="description" rows="4" class="block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm focus:ring-blue-500 focus:border-blue-500" />
                            </div>
                        </div>
                    </div>
                </div>

                <div v-else>
                    <div class="grid grid-cols-4 gap-6 mt-6">
                        <div class="col-span-4 sm:col-span-4">
                            <label for="last-name" class="block text-sm font-medium text-gray-700"> Name </label>
                            <input v-model="form.name" type="text" name="last-name" id="last-name" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
                        </div>

                        <div class="sm:col-span-4">
                            <label for="description" class="block text-sm font-medium text-blue-gray-900"> Description </label>
                            <div class="mt-1">
                                <textarea v-model="form.description" id="description" name="description" rows="4" class="block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm focus:ring-blue-500 focus:border-blue-500" />
                            </div>
                            <p class="mt-3 text-sm text-blue-gray-500">Brief description for your profile. URLs are hyperlinked.</p>
                        </div>

                        <div v-if="modal.action == 'sub-category'" class="col-span-4 sm:col-span-4">
                            <label for="type" class="block text-sm font-medium text-gray-700">Parent Category *</label>

                            <select-menu  />
                        </div>

                        <div v-else class="col-span-4 sm:col-span-4">
                            <label for="type" class="block text-sm font-medium text-gray-700">Department *</label>

                            <select-menu />
                        </div>

                        <div class="col-span-4">
                            <label for="cover-photo" class="block pb-2 text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Category Image </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="flex justify-center max-w-lg px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                    <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload" class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-6 mt-6">

                        <div class="col-span-2">
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input v-model="form.featured" id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" />
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="comments" class="font-medium text-gray-700">Featured</label>
                                    <p id="comments-description" class="text-gray-500">Category will appear on the home page probably.</p>
                                </div>
                            </div>

                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input v-model="form.menu" id="candidates" aria-describedby="candidates-description" name="candidates" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" />
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="candidates" class="font-medium text-gray-700">Show in menus</label>
                                    <p id="candidates-description" class="text-gray-500">Is what it is.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </template>

        </Modal>
    </main>

</template>

<script>

import {
    ChevronRightIcon,
    CheckCircleIcon,
    PlusCircleIcon,
    TrashIcon,
    PencilIcon,
    CashIcon,
} from "@heroicons/vue/solid";

import axios from 'axios';
import Modal from '../../components/Modal.vue';
import selectMenu from '../../components/form/select-menu.vue';

export default {
    components: {
        ChevronRightIcon,
        CheckCircleIcon,
        PlusCircleIcon,
        TrashIcon,
        PencilIcon,
        CashIcon,
        Modal,
        selectMenu,
    },

    setup() {
        return {

        };
    },

    computed: {
        departmentOptions() {

        },

        categoryOptions() {

        }
    },

    data(){
        return {
            tab: {
                active: '',
                description: '',
            },
            description: '',
            departments: [],
            categories: [],
            form: {
                department: {
                    id: '',
                    name: '',
                    description: '',
                },
            },
            modal: {
                show: false,
                action: '',
                labels: {
                    department: {
                        header: '',
                        cancelBtn: '',
                        saveBtn: '',
                    },
                    header: 'Create Product',
                    cancelBtn: 'Cancel',
                    saveBtn: 'Save',
                }
            }
        };
    },


    methods: {

        setDepartment(department){
            this.tab.active = department.name;

            this.tab.description = department.description;

            this.department = department;

            this.categories = department.categories;
        },

        showDepartmentModal() {
            this.modal.labels.header = 'Create Department';
            this.modal.action = 'department';
            this.modal.show = true;

            this.form.department.name = '';
            this.form.department.description = '';
        },

        showEditDepartmentModal(department) {
            this.modal.labels.header = 'Edit Department';
            this.modal.action = 'department';
            this.modal.show = true;

            this.form.department = department;
        },

        showCategoryModal() {
            this.modal.labels.header = 'Create Category';
            this.modal.action = 'category';
            this.modal.show = true;

            this.form.department.name = '';
            this.form.department.description = '';
        },

        showEditCategoryModal(department) {
            this.modal.labels.header = 'Edit Category';
            this.modal.action = 'category';
            this.modal.show = true;

            this.form.department = department;
        },

        showSubCategoryModal(department) {
            this.modal.labels.header = 'Create Sub Category';
            this.modal.action = 'sub-category';
            this.modal.show = true;

            this.form.department = department;
        },

        showEditSubCategoryModal(department) {
            this.modal.labels.header = 'Edit Sub Category:';
            this.modal.action = 'sub-category';
            this.modal.show = true;

            this.form.department = department;
        },



        getDepartments() {
            axios.get('/dashboard/departments').then(response => {
                this.departments = response.data.data;

                this.setDepartment( this.departments[0] );
            });
        },

        storeDepartment() {
            axios.post(`/dashboard/department/store`, this.form).then( (response) => {

                console.log(response.data.data);

                this.form = response.data.data;

                this.modal.labels.header = 'Edit Department';
                this.modal.action = 'department';
                this.modal.show = true;
            });
        },

        editDepartment(departmentId) {
            axios.get(`/dashboard/department/${departmentId}/edit`).then( (response) => {

                console.log(response.data.data);

                this.form = response.data.data;

                this.modal.labels.header = 'Edit Department';
                this.modal.action = 'department';
                this.modal.show = true;
            });
        },

        deleteDepartment(departmentId) {
            this.modal.header = 'Delete';

            this.modal.show = true;
        },

        storeCategory() {
            this.modal.labels.header = 'Create Category';
            this.modal.action = 'category';
            this.modal.show = true;
        },

        editCategory(categoryId) {
            axios.get(`/dashboard/categories/${categoryId}/edit`).then( (response) => {

                console.log(response.data.data);

                const category = response.data.data;

                this.form = response.data.data;

                this.modal.labels.header = `Edit ${category.name} Category`;

                this.modal.action = 'category';

                this.modal.show = true;
            });
        },

        deleteCategory(categoryId) {
            this.modal.header = 'Delete';

            this.modal.show = true;
        },

    },

    mounted() {
        this.getDepartments();
    }

};

</script>
