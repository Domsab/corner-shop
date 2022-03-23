<template>
    <div class="grid grid-cols-4 gap-6 mt-6">
        <div class="col-span-4 sm:col-span-4">
            <label for="last-name" class="block text-sm font-medium text-gray-700"> Code </label>
            <input v-model="form.code" type="text" name="last-name" id="last-name" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
        </div>

        <div class="col-span-4 sm:col-span-4">
            <label for="last-name" class="block text-sm font-medium text-gray-700"> Name </label>
            <input v-model="form.name" type="text" name="last-name" id="last-name" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
        </div>

        <div class="col-span-4 sm:col-span-4">
            <label for="location" class="block text-sm font-medium text-gray-700"> Frontend Type </label>
            <select v-model="form.frontendType" id="location" name="location" class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option>United States</option>
                <option selected="">Canada</option>
                <option>Mexico</option>
            </select>
        </div>

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
        </div>

        <div class="col-span-2">
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

        <div class="col-span-4">
            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                <button @click="$emit('close')" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Save
                </button>
                <button @click="$emit('close')" type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" ref="cancelButtonRef">
                    Cancel
                </button>
            </div>
        </div>

    </div>
</template>


<script>

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
            form: {
                id: this.attributeData.id,
                code: this.attributeData.code,
                name: this.attributeData.name,
                frontendType: this.attributeData.frontendType,
                featured: this.attributeData.featured,
                menu: this.attributeData.menu,
            },
        }
    },

    methods: {
        submit(){
            this.$emit('submitForm', this.formData);
        }
    }
}

</script>
