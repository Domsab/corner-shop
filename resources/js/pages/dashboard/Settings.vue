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
                                        Settings
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
                                        Verified account
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="flex mt-6 space-x-3 md:mt-0 md:ml-4">
                        <button
                            type="button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                        >
                            Add money
                        </button>
                        <button
                            type="button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                        >
                            Send money
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Tabs -->
        <div class="px-4 mt-8 first-line:mt-8 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
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

        <component :is="activeComponent" :settings="componentProps" @submit="updateSettings"/>

    </main>

</template>

<script>

const tabs = [
  { name: 'General', href: '#', current: true, component:'GeneralSettings' },
  { name: 'Logo', href: '#', current: false, component:'LogoSettings' },
  { name: 'Footer', href: '#', current: false, component:'FooterSettings' },
  { name: 'Social', href: '#', current: false, component:'SocialSettings' },
  { name: 'Analytics', href: '#', current: false, component:'AnalyticsSettings' },
  { name: 'Payments', href: '#', current: false, component:'PaymentSettings' },
]

import axios from "axios";

import { CheckCircleIcon } from "@heroicons/vue/solid";

import GeneralSettings from '../../components/dashboard/settings-general.vue';
import LogoSettings from '../../components/dashboard/settings-logo.vue';
import FooterSettings from '../../components/dashboard/settings-footer.vue';
import SocialSettings from '../../components/dashboard/settings-social.vue';
import AnalyticsSettings from '../../components/dashboard/settings-analytics.vue';
import PaymentSettings from '../../components/dashboard/settings-payments.vue';

    export default {
        name: 'Settings',

        components:{
            GeneralSettings,
            LogoSettings,
            FooterSettings,
            SocialSettings,
            AnalyticsSettings,
            PaymentSettings,
            CheckCircleIcon,
        },

        setup(){
            return {
                tabs
            }
        },

        data(){
            return{
                activeTab: '',
                activeComponent: '',
                componentProps: [],
            }
        },

        methods: {
            switchComponents(tab){
                this.activeComponent = tab.component;
                this.activeTab = tab.name;
            },

            getSettings() {
                axios.get('/dashboard/settings').then(response => {
                    response.data.data.forEach(setting => {
                       this.componentProps[setting.key] = setting.value;
                    });

                    this.activeComponent = 'GeneralSettings';
                    this.activeTab = 'General';
                });
            },

            updateSettings(formData) {
                console.log('updateSettings', formData);

                axios.post('/dashboard/settings', formData).then(response => {
                    this.componentProps = response.data;
                });
            }
        },

        mounted() {
            console.log('Component mounted.');

            this.getSettings();


        },
    }
</script>
