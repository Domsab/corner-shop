<template>

    <main class="flex-1">

        <div class="bg-white shadow">
            <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
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
                                        Attributes
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
                                        Create and modify a products attributes
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="flex mt-6 space-x-3 md:mt-0 md:ml-4">
                        <button
                            @click="create()"
                            type="button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                        >
                            Add Attribute
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="max-w-6xl px-4 mx-auto mt-8 text-lg font-medium leading-6 text-gray-900 sm:px-6 lg:px-8">
            Existing Attributes
        </h2>

        <!-- Activity list (smallest breakpoint only) -->
        <div class="shadow sm:hidden">
            <ul
                role="list"
                class="mt-2 overflow-hidden divide-y divide-gray-200 shadow sm:hidden"
            >
                <li
                    v-for="attribute in attributes"
                    :key="attribute.id"
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
                                        attribute.id
                                    }}</span>
                                    <span
                                        ><span
                                            class="font-medium text-gray-900"
                                            >{{ attribute.id}}</span
                                        >
                                        {{ attribute.id}}</span
                                    >
                                    {{ attribute.id}}
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
                                        Code
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        Name
                                    </th>
                                    <th
                                        class="hidden px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:block"
                                    >
                                        Frontend Type
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        Filterable
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        Required
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
                                    v-for="attribute in attributes"
                                    :key="attribute.id"
                                    class="bg-white"
                                >
                                    <td
                                        class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap"
                                    >
                                        <div class="flex">
                                                <p
                                                    class="text-gray-500 truncate group-hover:text-gray-900"
                                                >
                                                    {{ attribute.code}}
                                                </p>

                                        </div>
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        {{ attribute.name}}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        {{ attribute.frontend_type }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-center text-gray-500 whitespace-nowrap"
                                    >
                                        <CheckCircleIcon v-if="attribute.is_filterable" class="w-4 h-6 text-green-600" aria-hidden="true"/>
                                        <XCircleIcon v-else class="w-4 h-6 text-red-600" aria-hidden="true"/>
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-center text-gray-500 whitespace-nowrap"
                                    >
                                        <CheckCircleIcon v-if="attribute.is_required" class="w-4 h-6 text-green-600" aria-hidden="true"/>
                                        <XCircleIcon v-else class="w-4 h-6 text-red-600" aria-hidden="true"/>
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                    >
                                        <span class="relative z-0 inline-flex rounded-md shadow-sm">
                                            <button type="button" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                <PencilIcon class="w-4 h-6 text-blue-600" aria-hidden="true" @click="edit(attribute.id)"/>
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

        <Modal
            :show="modal.show"
            :tabs="tabs"
            :activeTab="activeTab"
            :showButtons="false"
            @switchComponents="switchComponents"
            @close="modal.show = false">

            <template #header>
                <div>
                    <h2 id="payment-details-heading" class="text-lg font-medium leading-6 text-gray-900"> {{ modal.labels.header }}</h2>
                    <p class="mt-1 text-sm text-gray-500"> {{ modal.labels.subHeader }} </p>
                </div>
            </template>

            <template #body>
                <component
                    :is="activeComponent"
                    :attributeData="attributeData"
                    @submitForm="create"
                    @close="modal.show = false"
                />
            </template>
        </Modal>
    </main>

</template>

<script>

import {
    CashIcon,
    TrashIcon,
    PencilIcon,
    XCircleIcon,
    CheckCircleIcon,
    ChevronRightIcon,
} from "@heroicons/vue/solid";

import axios from 'axios';
import Modal from '../../components/Modal.vue';
import attributeDetails from "../../components/admin/attribute-details.vue";
import attributeValues from '../../components/admin/attribute-values.vue';

const tabs = [
    {
        name: 'General',
        component: 'attributeDetails',
        description: 'Modify a products attributes.'
    },
    {
        name: 'Values',
        component: 'attributeValues',
        description: 'Modify a products attributes.'
    },
];

export default {
    components: {
        Modal,
        attributeValues,
        attributeDetails,
        CashIcon,
        TrashIcon,
        PencilIcon,
        XCircleIcon,
        CheckCircleIcon,
        ChevronRightIcon,
    },

    setup() {
        return {
            tabs,
        };
    },

    data(){
        return {
            attributes: [],
            attributeData: [],
            activeTab: 'General',
            activeComponent: 'attributeDetails',
            modal: {
                show: false,
                labels: {
                    header: 'Create Attribute',
                    subHeader: 'SubHeader',
                    cancelBtn: 'Cancel',
                    saveBtn: 'Save',
                }
            },
            formData: {
                attributes: {

                },
                values: {

                },
            },
        };
    },

    methods: {

        switchComponents(tab){
            this.activeTab = tab.name;

            this.activeComponent = tab.component;

            this.modal.labels.header = tab.name;

            this.modal.labels.subHeader = tab.description;
        },

        get() {
            axios.get('/admin/attributes').then(response => {
                this.attributes = response.data.data;
            });
        },

        create() {
            this.modal.labels.header = 'Create Attribute';
            this.activeTab = 'General';
            this.activeComponent = 'attributeDetails';

            this.modal.show = true;
        },

        edit(id) {
            axios.get(`/admin/attributes/${id}/edit`).then(response => {
                this.attributeData = response.data.data;

                this.modal.labels.header = 'Edit Attribute';
                this.activeTab = 'General';
                this.activeComponent = 'attributeDetails';

                this.modal.show = true;
            });
        },

        saveAttributeValues() {
            let attributeId = this.attributeid;
            axios.post('/admin/attributes/add-values', {
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
        this.get();
    }

};

</script>
