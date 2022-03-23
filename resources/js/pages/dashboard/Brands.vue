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
                                        Brands
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
                                        Create and modify a products brands
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="flex mt-6 space-x-3 md:mt-0 md:ml-4">
                        <button
                            @click="showCreateAttributeForm()"
                            type="button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                        >
                            Add Brand
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="max-w-6xl px-4 mx-auto mt-8 text-lg font-medium leading-6 text-gray-900 sm:px-6 lg:px-8">
            Existing Brands
        </h2>

            <!-- Activity list (smallest breakpoint only) -->
            <div class="shadow sm:hidden">
                <ul
                    role="list"
                    class="mt-2 overflow-hidden divide-y divide-gray-200 shadow sm:hidden"
                >
                    <li
                        v-for="brand in brands"
                        :key="brand.id"
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
                                            brand.id
                                        }}</span>
                                        <span
                                            ><span
                                                class="font-medium text-gray-900"
                                                >{{ brand.id}}</span
                                            >
                                            {{ brand.id}}</span
                                        >
                                        {{ brand.id}}
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
                                        Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-gray-200"
                                >
                                    <tr
                                        v-for="brand in brands"
                                        :key="brand.id"
                                        class="bg-white"
                                    >
                                        <td
                                            class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap"
                                        >
                                            <div class="flex">
                                                    <p
                                                        class="text-gray-500 truncate group-hover:text-gray-900"
                                                    >
                                                        {{ brand.id}}
                                                    </p>

                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                        >
                                            {{ brand.name}}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                        >
                                            {{ brand.slug }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                        >
                                            <span class="relative z-0 inline-flex rounded-md shadow-sm">
                                                <button type="button" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                    <PencilIcon class="w-4 h-6 text-blue-600" aria-hidden="true" @click="showEditAttributeForm()"/>
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

            <Modal :show="modalData.show" @close="modalData.show = false">
                <template #header>{{ modalData.labels.header }}</template>
                <template #form>

                    <div v-if="modalData.action == 'edit'" class="mt-6">
                        <div class="lg:hidden">
                            <label for="selected-tab" class="sr-only">Select a tab</label>
                            <select id="selected-tab" name="selected-tab" class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                                <option v-for="tab in tabs" :key="tab.formName" @click="switchForms(tab)" :selected="modalData.activeForm === tab.formName">{{ tab.name }}</option>
                            </select>
                        </div>
                        <div class="hidden lg:block">
                            <div class="border-b border-gray-200">
                                <nav class="flex -mb-px space-x-8">
                                <a v-for="tab in tabs" :key="tab.formName" :href="tab.href" @click="switchForms(tab)" :class="[modalData.activeForm === tab.formName ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700', 'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm']">
                                    {{ tab.name }}
                                </a>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-6 mt-6">
                        <div class="col-span-4 sm:col-span-4">
                            <label for="last-name" class="block text-sm font-medium text-gray-700"> Name </label>
                            <input type="text" name="last-name" id="last-name" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
                        </div>

                        <div class="col-span-4">
                            <label for="photo" class="block text-sm font-medium text-blue-gray-900"> Brand logo </label>
                            <div class="flex items-center mt-1">
                                <img class="inline-block w-12 h-12 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2.5&w=256&h=256&q=80" alt="" />
                                <div class="flex ml-4">
                                <div class="relative flex items-center px-3 py-2 bg-white border rounded-md shadow-sm cursor-pointer border-blue-gray-300 hover:bg-blue-gray-50 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-blue-gray-50 focus-within:ring-blue-500">
                                    <label for="user-photo" class="relative text-sm font-medium pointer-events-none text-blue-gray-900">
                                    <span>Change</span>
                                    <span class="sr-only"> user photo</span>
                                    </label>
                                    <input id="user-photo" name="user-photo" type="file" class="absolute inset-0 w-full h-full border-gray-300 rounded-md opacity-0 cursor-pointer" />
                                </div>
                                <button type="button" class="px-3 py-2 ml-3 text-sm font-medium bg-transparent border border-transparent rounded-md text-blue-gray-900 hover:text-blue-gray-700 focus:outline-none focus:border-blue-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-gray-50 focus:ring-blue-500">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </template>

                <template #cancelBtn>Cancel</template>

                <template #saveBtn>Save</template>

            </Modal>
    </main>

</template>

<script>

import {
    CheckCircleIcon,
    XCircleIcon,
    TrashIcon,
    PencilIcon,
} from "@heroicons/vue/solid";

import axios from 'axios';
import Modal from '../../components/Modal.vue';


const tabs = [
  { name: 'General', href: '#', current: true, formName: 'brands'},
  { name: 'Values', href: '#', current: false, formName: 'values'},
];

export default {
    components: {
        CheckCircleIcon,
        XCircleIcon,
        TrashIcon,
        PencilIcon,
        Modal
    },

    setup() {
        return {
            tabs,
        };
    },

    data(){
        return {
            brands: [],
            attributeValues: [],
            modalData: {
                show: false,
                labels: {
                    header: 'Create Brand',
                },

                action: 'create',
                activeForm: 'brands',
            },
            formData: {
                brands: {

                },
                values: {

                },
            }
        };
    },

    methods: {
        showCreateAttributeForm() {
            this.modalData.labels.header = 'Create Brand';
            this.modalData.action = 'create';
            this.modalData.activeForm = 'brands';

            this.modalData.show = true;
        },

        showEditAttributeForm() {
            this.modalData.labels.header = 'Edit Brand';
            this.modalData.action = 'edit';
            this.modalData.activeForm = 'brands';

            this.modalData.show = true;
        },

        switchForms(tab){
            this.modalData.activeTab = this.modalData.activeForm = tab.formName;

        },

        getAttributes() {
            axios.get('/dashboard/brands').then(response => {
                console.log(response);
                this.brands = response.data.data;
            });
        },

        getAttributeValues() {
            let attributeId = this.attributeid;

            axios.post('/admin/brands/get-values', {
                id: attributeId
            }).then (function(response){
                this.attributeValues = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },

        saveAttributeValues() {
            let attributeId = this.attributeid;
            axios.post('/admin/brands/add-values', {
                id: attributeId,
                value: this.value,
                price: this.price,
            }).then (function(response){
                this.values.push(response.data);
                this.resetValue();
                this.$swal("Success! Value added successfully!", {
                    icon: "success",
                });
            }).catch(function (error) {
                console.log(error);
            });
        }

    },

    mounted() {
        this.getAttributes();
    }

};

</script>
