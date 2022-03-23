<template>
    <form>
        <div class="grid grid-cols-4 gap-6 mt-6">

            <div class="col-span-3 sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium text-gray-700"> Name </label>
                <input v-model="form.name" type="text" name="last-name" id="last-name" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
            </div>

            <div class="col-span-1 sm:col-span-1">
                <label for="last-name" class="block text-sm font-medium text-gray-700"> SKU </label>
                <input v-model="form.sku" type="text" name="last-name" id="last-name" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
            </div>

            <div class="col-span-2 sm:col-span-2">
                <label for="location" class="block text-sm font-medium text-gray-700"> Brand </label>
                <select v-model="form.brand" id="location" name="location" class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option>United States</option>
                    <option selected="">Canada</option>
                    <option>Mexico</option>
                </select>
            </div>

            <div class="col-span-2 sm:col-span-2">
                <label for="categories" class="block text-sm font-medium text-gray-700"> Categories </label>
                <v-select
                    multiple
                    :options="getCategories"
                    id="categories"
                    name="categories"
                    class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
            </div>

            <div class="col-span-1 sm:col-span-1">
                <label for="last-name" class="block text-sm font-medium text-gray-700"> Price </label>
                <input v-model="form.price" type="text" name="last-name" id="last-name" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
            </div>

            <div class="col-span-1 sm:col-span-1">
                <label for="last-name" class="block text-sm font-medium text-gray-700"> Special Price </label>
                <input v-model="form.special_price" type="text" name="last-name" id="last-name" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
            </div>

            <div class="col-span-1 sm:col-span-1">
                <label for="last-name" class="block text-sm font-medium text-gray-700"> Quantity </label>
                <input v-model="form.quantity" type="text" name="last-name" id="last-name" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
            </div>

            <div class="col-span-1 sm:col-span-1">
                <label for="last-name" class="block text-sm font-medium text-gray-700"> Weight </label>
                <input v-model="form.weight" type="text" name="last-name" id="last-name" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
            </div>

            <div class="sm:col-span-4">
                <label for="description" class="block text-sm font-medium text-blue-gray-900"> Description </label>
                <div class="mt-1">
                    <textarea v-model="form.description" id="description" name="description" rows="4" class="block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <p class="mt-3 text-sm text-blue-gray-500"> Brief description for your profile. URLs are hyperlinked. </p>
            </div>

            <div class="col-span-2">
                <fieldset>
                    <div class="relative flex items-start mt-2">
                        <div class="flex items-center h-5">
                            <input v-model="form.status" id="status" aria-describedby="status-description" name="status" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" />
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="status" class="font-medium text-gray-700"> Status </label>
                            <p id="status-description" class="text-gray-500"> Is this product available for purchase. </p>
                        </div>
                    </div>

                    <div class="relative flex items-start mt-2">
                        <div class="flex items-center h-5">
                            <input v-model="form.featured" id="featured" aria-describedby="featured-description" name="featured" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" />
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="featured" class="font-medium text-gray-700"> Featured Homepage </label>
                            <p id="featured-description" class="text-gray-500"> Product will appear on featured sections. </p>
                        </div>
                    </div>

                    <div class="relative flex items-start mt-2">
                        <div class="col-span-2 sm:col-span-2">
                            <label for="categories" class="block text-sm font-medium text-gray-700"> Categories </label>
                            <v-select
                                multiple
                                label="name"
                                :options="categories"
                                id="categories"
                                name="categories">
                            </v-select>
                        </div>
                    </div>
                </fieldset>
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
    </form>
</template>

<script>

import VueSelect from 'vue-select';
import tailVueSelect from 'tailwindcss-vue-select';
import 'vue-select/dist/vue-select.css';

import {
    CheckCircleIcon,
    XCircleIcon,
    TrashIcon,
    PencilIcon,
} from "@heroicons/vue/solid";

export default {
    name: "Product Details",

    components:{
        tailVueSelect,
        'v-select': VueSelect,
    },

    computed: {

        getCategories(){
            var formatted = [];

            this.categories.forEach(category => {
                formatted.push({'label': category.name, 'id': category.id});
            });

            return formatted;
        },

        getBrands(){
            var formatted = [];

            this.brands.forEach(brand => {
                formatted.push({'label': brand.name, 'id': brand.id});
            });

            return formatted;
        }

    },

    props: {
        productData: {
            type: Array,
            default: [],
        },
        categories: {
            type: Array,
            default: [],
        },
        brands: {
            type: Array,
            default: [],
        },
    },

    data(){
        return {
            form: {
                id : this.productData.id,
                name : this.productData.name,
                sku : this.productData.sku,
                brand : this.productData.brand,
                categories : this.productData.categories,
                price : this.productData.price,
                special_price : this.productData.special_price,
                quantity : this.productData.quantity,
                weight : this.productData.weight,
                description : this.productData.description,
                status : this.productData.status,
                featured : this.productData.featured,
            },
        }
    },

    methods: {
        submit(){
            console.log('submit', this.form);
            (this.form.id === '')
                ? this.$emit('submitForm', this.form)
                : this.$emit('updateForm', this.form);
        }
    },

    mounted() {
        console.log(this.productData, this.categories, this.brands);
    }

}

</script>
