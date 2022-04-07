<template>
    <Modal :show="modal.show" @close="modal.show = false">
        <template #header>{{ modal.labels.header }}</template>

        <template #form>

            <div class="mt-6">
                <div class="lg:hidden">
                    <label for="selected-tab" class="sr-only">Select a tab</label>
                    <select id="selected-tab" name="selected-tab" class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                        <option
                            v-for="tab in tabs"
                            :key="tab.name"
                            @click="switchComponents(tab)"
                            :selected="activeTab === tab.name"
                        >{{ tab.name }}</option>
                    </select>
                </div>
                <div class="hidden lg:block">
                    <div class="border-b border-gray-200">
                        <nav class="flex -mb-px space-x-8">
                            <a
                                v-for="tab in tabs"
                                :key="tab.name"
                                :href="tab.href"
                                @click="switchComponents(tab)"
                                :class="[activeTab === tab.name ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700', 'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm']"
                            >{{ tab.name }}</a>
                        </nav>
                    </div>
                </div>
            </div>

            <component
                :is="activeComponent"
                :productData="productData"
                :brands="brands"
                :categories="categories"
                @submit="update"
            />

        </template>

        <template #cancelBtn> {{modal.labels.cancelBtn}} </template>

        <template #saveBtn> {{modal.labels.saveBtn}} </template>

    </Modal>
</template>

<script>

import axios from 'axios';
import Modal from '../../components/Modal.vue';

import productDetails from "../../components/dashboard/product-details.vue";
import productAttributes from "../../components/dashboard/product-attributes.vue";
import productImages from "../../components/dashboard/product-images.vue";

const tabs = [
    { name: 'General', href: '#', current: true, component: 'productDetails'},
    { name: 'Images', href: '#', current: false, component: 'productImages'},
    { name: 'Attributes', href: '#', current: false, component: 'productAttributes'},
];

</script>
