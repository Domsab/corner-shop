<template>
    <div class="grid grid-cols-4 gap-6 mt-6">
        <div class="col-span-4">
            <div class="flex flex-col mt-2">
                <div class="min-w-full overflow-hidden overflow-x-auto align-middle shadow sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                >
                                    Code
                                </th>
                                <th
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                >
                                    Value
                                </th>
                                <th
                                    class="hidden px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:block"
                                >
                                    Price
                                </th>
                                <th
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                >
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-if="form.create === true" class="bg-white">
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                    <input
                                        v-model="form.store.code"
                                        type="text"
                                        name="site-name"
                                        id="site-name"
                                        autocomplete="cc-given-name"
                                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
                                </td>
                                <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                    <input
                                        v-model="form.store.value"
                                        type="text"
                                        name="site-name"
                                        id="site-name"
                                        autocomplete="cc-given-name"
                                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
                                </td>
                                <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                    <input
                                        v-model="form.store.price"
                                        type="text"
                                        name="site-name"
                                        id="site-name"
                                        autocomplete="cc-given-name"
                                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
                                </td>
                                <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                    <span class="relative z-0 inline-flex rounded-md shadow-sm">
                                        <button type="button" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                            Cancel
                                        </button>
                                        <button type="button" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                            Save
                                        </button>
                                    </span>
                                </td>
                            </tr>
                            <tr
                                v-for="attribute in attributeValues"
                                :key="attribute.id"
                                class="bg-white"
                            >
                                <div v-if="attribute.id === form.id">
                                    <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                        <p class="text-gray-500 truncate group-hover:text-gray-900" >
                                            {{ attribute.code}}
                                        </p>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                        <input
                                            v-model="form.update.value"
                                            type="text"
                                            name="site-name"
                                            id="site-name"
                                            autocomplete="cc-given-name"
                                            class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
                                    </td>
                                    <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                        <input
                                            v-model="form.update.price"
                                            type="text"
                                            name="site-name"
                                            id="site-name"
                                            autocomplete="cc-given-name"
                                            class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
                                    </td>
                                    <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                        <span class="relative z-0 inline-flex rounded-md shadow-sm">
                                            <button type="button" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                Save
                                            </button>
                                            <button type="button" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                Cancel
                                            </button>
                                        </span>
                                    </td>
                                </div>

                                <div else>
                                    <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                        <div class="flex">
                                            <p class="text-gray-500 truncate group-hover:text-gray-900" >
                                                {{ attribute.code}}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                        {{ attribute.name}}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                        {{ attribute.frontend_type }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap">
                                        <span class="relative z-0 inline-flex rounded-md shadow-sm">
                                            <button type="button" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                <PencilIcon class="w-4 h-6 text-blue-600" aria-hidden="true" @click="edit(attribute)"/>
                                            </button>
                                            <button type="button" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                <TrashIcon class="w-4 h-6 text-red-600" aria-hidden="true"/>
                                            </button>
                                        </span>
                                    </td>
                                </div>
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

        <div class="col-span-4">
            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                <button @click="create()" type="button" class="px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm alling-bottom hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Add New Value
                </button>
                <button @click="$emit('close')" type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" ref="cancelButtonRef">
                    Close
                </button>
            </div>
        </div>

    </div>
</template>


<script>

import axios from 'axios';

import {
    TrashIcon,
    PencilIcon,
} from "@heroicons/vue/solid";

export default {
    name: "Social Settings",

    components: {
        TrashIcon,
        PencilIcon,
    },

    props: {
        attributeData: {
            type: Object,
            default: {},
        },
    },

    data(){
        return {
            attributeValues: [],
            form: {
                create: false,
                update: {
                    id: '',
                    name: '',
                    value:'',
                    attribute_id: this.attributeData.id,
                },
                store: {
                    value: '',
                    price: '',
                    attribute_id: this.attributeData.id,
                }
            },
        }
    },

    methods: {

        get() {
            axios.post('/dashboard/attributes/values/get', {id: this.attributeData.id})
                .then ( response => {
                    this.attributeValues = response.data.data;
                    console.log('get values', this.attributeValues);
                })
                .catch( error => {
                    console.log(error);
                });
        },

        create(attribute) {
            this.form.create = true;
        },

        edit(attribute) {

        },

        store() {
            axios.post('/dashboard/attributes/values/store', this.form.store)
                .then ( response => {
                    this.attributeValues = response.data.data;
                    console.log('get values', this.attributeValues);
                })
                .catch( error => {
                    console.log(error);
                });
        },

        update() {
            axios.post('/dashboard/attributes/values/update', this.form.update )
                .then ( response => {
                    this.attributeValues = response.data.data;
                    console.log('get values', this.attributeValues);
                })
                .catch( error => {
                    console.log(error);
                });
        },

    },

    mounted() {
        this.get();
    }
}

</script>
