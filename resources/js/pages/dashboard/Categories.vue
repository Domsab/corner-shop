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
                                        Categories
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
                            @click="modal.show = true"
                            type="button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                        >
                            Add Category
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="max-w-6xl px-4 mx-auto mt-8 text-lg font-medium leading-6 text-gray-900 sm:px-6 lg:px-8">
            Recent activity
        </h2>

        <!-- Activity list (smallest breakpoint only) -->
        <div class="shadow sm:hidden">
            <ul
                role="list"
                class="mt-2 overflow-hidden divide-y divide-gray-200 shadow sm:hidden"
            >
                <li
                    v-for="category in categories"
                    :key="category.id"
                >

                        <span class="flex items-center space-x-4">
                            <span class="flex flex-1 space-x-2 truncate">
                                <CashIcon
                                    class="flex-shrink-0 w-5 h-5 text-gray-400"
                                    aria-hidden="true"
                                />
                                <span
                                    class="flex flex-col text-sm text-gray-500 truncate"
                                >
                                    <span class="truncate">{{
                                        category.id
                                    }}</span>
                                    <span
                                        ><span
                                            class="font-medium text-gray-900"
                                            >{{ category.id}}</span
                                        >
                                        {{ category.id}}</span
                                    >
                                    {{ category.id}}
                                </span>
                            </span>
                            <ChevronRightIcon
                                class="flex-shrink-0 w-5 h-5 text-gray-400"
                                aria-hidden="true"
                            />
                        </span>

                </li>
            </ul>

            <nav
                class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200"
                aria-label="Pagination"
            >
                <div class="flex justify-between flex-1">
                    <a
                        href="#"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500"
                    >
                        Previous
                    </a>
                    <a
                        href="#"
                        class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500"
                    >
                        Next
                    </a>
                </div>
            </nav>
        </div>

        <!-- Activity table (small breakpoint and up) -->
        <div class="hidden sm:block">
            <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
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
                                        Parent
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
                            <tbody
                                class="bg-white divide-y divide-gray-200"
                            >
                                <tr
                                    v-for="category in categories"
                                    :key="category.id"
                                    class="bg-white"
                                >
                                    <td
                                        class="w-full px-6 py-4 text-sm text-gray-900 max-w-0 whitespace-nowrap"
                                    >
                                        <div class="flex">
                                                <p
                                                    class="text-gray-500 truncate group-hover:text-gray-900"
                                                >
                                                    {{ category.id}}
                                                </p>

                                        </div>
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        {{ category.name}}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        {{ category.slug}}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        {{ category.parent_id}}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        {{ category.featured}}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        {{ category.menu}}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        {{ category.order}}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        <span class="relative z-0 inline-flex rounded-md shadow-sm">
                                            <button @click="edit(category.id)" type="button" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                <PencilIcon class="w-4 h-6 text-blue-600" aria-hidden="true"/>
                                            </button>
                                            <button type="button" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                <TrashIcon class="w-4 h-6 text-red-600" aria-hidden="true"/>
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

        <Modal :show="modal.show" @close="modal.show = false">
            <template #header>
                <div>
                    <h2 id="payment-details-heading" class="text-lg font-medium leading-6 text-gray-900"> {{ modal.labels.header }}</h2>
                    <p class="mt-1 text-sm text-gray-500"> {{ modal.labels.subHeader }} </p>
                </div>
            </template>

            <template #body>
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

                    <div class="col-span-4 sm:col-span-4">
                        <label for="parent" class="block text-sm font-medium text-gray-700">Parent Category</label>
                        <select id="parent" name="parent" class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option selected>None</option>
                            <option>United States</option>
                            <option>Mexico</option>
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Category Image </label>
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

                    <div class="col-span-2">
                        <fieldset>
                            <legend class="sr-only">Notifications</legend>
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
                        </fieldset>
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
    TrashIcon,
    PencilIcon,
    CashIcon,
} from "@heroicons/vue/solid";

import axios from 'axios';
import Modal from '../../components/Modal.vue';

export default {
    components: {
        ChevronRightIcon,
        CheckCircleIcon,
        TrashIcon,
        PencilIcon,
        CashIcon,
        Modal,
    },

    setup() {
        return {

        };
    },

    data(){
        return {
            categories: [],
            modal: {
                show: false,
                header: 'Create Category',
            },
            form: {},
            modal: {
                show: false,
                labels: {
                    header: 'Create Product',
                    cancelBtn: 'Cancel',
                    saveBtn: 'Save',
                }
            }
        };
    },


    methods: {

        get() {
            axios.get('/dashboard/categories').then(response => {
                this.categories = response.data.data;
                console.log(this.categories);
            });
        },

        create() {
            this.modal.header = 'Create Category';

            this.modal.show = true;
        },

        edit(categoryId) {
            axios.get(`/dashboard/categories/${categoryId}/edit`).then( (response) => {

                console.log(response.data.data);

                this.form = response.data.data;

                this.modal.header = 'Edit Category';

                this.modal.show = true;
            });
        },

        delete(categoryId) {
            this.modal.header = 'Delete';

            this.modal.show = true;
        },
    },

    mounted() {
        this.get();
    }

};

</script>
