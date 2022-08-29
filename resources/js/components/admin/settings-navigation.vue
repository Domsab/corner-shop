<template>
    <!-- Tab Content -->
    <div class="grid grid-cols-9 gap-5 my-4 bg-white">
        <!-- Menu Table -->
        <div class="col-span-6">
            <div
                class="min-w-full overflow-hidden overflow-x-auto align-middle shadow sm:rounded-lg"
            >
                <table class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead>
                        <tr>
                            <th
                                scope="col"
                                class="w-48 py-3 pl-6 pr-1 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                            >
                                Label
                            </th>
                            <th
                                scope="col"
                                class="w-48 py-3 pl-6 pr-1 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                            >
                                Department
                            </th>
                            <th
                                scope="col"
                                class="py-3 pl-6 pr-1 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                            >
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr v-for="item in form.navigation" :key="item.email">
                            <td
                                class="px-6 py-4 text-sm text-gray-900 max-w-0 whitespace-nowrap"
                            >
                                <input
                                    v-if="editingItem.id === item.id"
                                    type="text"
                                    name="site-title"
                                    id="site-title"
                                    v-model="editingItem.label"
                                    autocomplete="cc-family-name"
                                    class="block px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm w-44 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
                                <span v-else >{{ item.label }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 max-w-0 whitespace-nowrap">
                                <select
                                     v-if="editingItem.id === item.id"
                                     id="navigation"
                                     name="country"
                                     v-model="editingItem.department"
                                     autocomplete="country-name"
                                     class="block w-48 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                    <option
                                        v-for="department in settings.departments"
                                        :key="department.id"
                                        :value="department.id"
                                        > {{ department.name }} </option>
                                </select>
                                <span v-else >{{ item.department }} department</span>
                            </td>
                            <td
                                class="px-6 py-4 text-sm text-right text-gray-500 whitespace-nowrap"
                            >
                                <span
                                    v-if="editingItem.id === item.id"
                                    class="relative z-0 inline-flex rounded-md shadow-sm"
                                >
                                    <button
                                        type="button"
                                        @click="cancelItem(item)"
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                                    >
                                        Cancel
                                    </button>
                                    <button
                                        type="button"
                                        @click="saveItem(item)"
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                                    >
                                        Save
                                    </button>
                                </span>
                                <span
                                    v-else
                                    class="relative z-0 inline-flex rounded-md shadow-sm"
                                >
                                    <button
                                        type="button"
                                        @click="editItem(item)"
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                                    >
                                        <PencilIcon
                                            class="w-4 h-6 text-blue-600"
                                            aria-hidden="true"
                                        />
                                    </button>
                                    <button
                                        type="button"
                                        @click="deleteItem(item)"
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
                                        Menu Items Available
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
                                        Menu Items Selected
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
                                    @click="addMenuItem()"
                                    type="button"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                                >
                                    <PlusCircleIcon
                                        class="w-4 h-6 text-blue-600"
                                        aria-hidden="true"
                                    />
                                    <span span class="pl-2">
                                        Create Menu Item
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

import {
    CheckCircleIcon,
    TrashIcon,
    PencilIcon,
    ChevronRightIcon,
    PlusCircleIcon
} from "@heroicons/vue/solid";

import { cloneDeep } from "lodash";

export default {
    name: "Settings Navigation",

    components: {
        TrashIcon,
        PencilIcon,
        ChevronRightIcon,
        CheckCircleIcon,
        PlusCircleIcon
    },

    props: {
        settings: {
            type: Array,
            default: [],
        },
    },

    watch: {
        form: {
            handler() {
                console.log('watch form',this.form.navigation);
                this.$emit("updateFormData", this.form);
            },
            deep: true,
        },
    },

    data() {
        return {
            editingItem: {
                id: '',
                label: '',
                department: '',
            },
            form: {
                navigation: [
                    {
                        id: 1,
                        label: "Nav Item 1",
                        department: "Front-end Developer",
                    },
                    {
                        id: 2,
                        label: "Nav Item 2",
                        department: "Front-end Developer",
                    },
                    {
                        id: 3,
                        label: "Nav Item 3",
                        department: "Front-end Developer",
                    },
                ],
            },
        };
    },

    methods: {
        addMenuItem() {
            this.editingItem = {
                id:'newItem',
                label: `Menu Item ${this.form.navigation.length + 1}`,
                department: "Front-end Developer",
            }
            this.form.navigation.push(this.editingItem)
        },

        editItem(item) {
            this.editingItem = cloneDeep(item)
        },

        deleteItem(item) {
             this.editingItem = item
        },

        saveItem() {
            if(this.editingItem.id === 'newItem'){
                this.editingItem.id = null
            } else {
                this.form.navigation.push(this.editingItem)
            }

        },

        cancelItem() {
            if(this.editingItem.id === 'newItem'){
                this.form.navigation.pop()
            }

            this.editingItem.id = null
        },
    },
};
</script>
