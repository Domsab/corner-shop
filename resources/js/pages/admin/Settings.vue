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
                            :class="[activeTab.name === tab.name ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700', 'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm']"
                        >{{ tab.name }}</a>
                    </nav>
                </div>
            </div>
        </div>

        <div class="px-4 mt-4 first-line:mt-8 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
            <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
                <section aria-labelledby="payment-details-heading">
                    <form action="#" method="POST">
                        <div class="rounded-t-none shadow-lg sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-6 bg-white sm:p-6">
                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <h2 id="payment-details-heading" class="text-lg font-medium leading-6 text-gray-900">{{ activeTab.name }}</h2>
                                        <p class="mt-1 text-sm text-gray-500">{{ activeTab.description }}</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-6 mt-6">
                                    <component :is="activeComponent" :settings="componentProps" @updateFormData="updateFormData"/>
                                </div>
                            </div>
                            <div class="h-16 px-4 py-3 text-right bg-gray-50 sm:px-6">
                                <button
                                    v-if="showSaveButton"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border border-transparent rounded-md shadow-sm hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                                    @click.prevent="updateSettings"
                                >Update Site Settings</button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>



    </main>

</template>

<script>

import axios from "axios";

import { CheckCircleIcon } from "@heroicons/vue/solid";

import GeneralSettings from '../../components/admin/settings-general.vue';
import FooterSettings from '../../components/admin/settings-footer.vue';
import SocialSettings from '../../components/admin/settings-social.vue';
import AnalyticsSettings from '../../components/admin/settings-analytics.vue';
import PaymentSettings from '../../components/admin/settings-payments.vue';
import NavigationSettings from "../../components/admin/settings-navigation.vue";

const tabs = [
  {
        name: 'General',
        href: '#',
        current: true,
        component:'GeneralSettings',
        header:'General Settings',
        description:''
    },
    {
        name: 'Navigation',
        current: false,
        component:'NavigationSettings',
        header:'Navigation Menus',
        description:''
    },
    {
        name: 'Footer',
        current: false,
        component:'FooterSettings',
        header:'Footer Information',
        description:''
    },
    {
        name: 'Social',
        current: false,
        component:'SocialSettings',
        header:'Social Links',
        description:''
    },
    {
        name: 'Analytics',
        current: false,
        component:'AnalyticsSettings',
        header:'Analytics',
        description:''
    },
    {
        name: 'Payments',
        current: false,
        component:'PaymentSettings',
        header:'Payments',
        description:'Update your billing information. Please note that updating your location could affect your tax rates.'
    },
]

export default {
    name: 'Settings',

    components:{
        GeneralSettings,
        FooterSettings,
        SocialSettings,
        AnalyticsSettings,
        PaymentSettings,
        NavigationSettings,
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
            showSaveButton: false,
            componentProps: [],
            formData: {},
        }
    },

    methods: {
        switchComponents(tab){
            this.activeComponent = tab.component;
            this.activeTab = tab;
            this.formData = {};
            this.showSaveButton = false
        },

        getSettings() {
            axios.get('/admin/settings')
                .then(response => {
                    response.data.data.forEach(setting => {
                        this.componentProps[setting.key] = setting.value;
                    });

                    this.activeComponent = 'GeneralSettings';
                    this.activeTab = 'General';
                })
                .then(() => {
                    axios.get("/admin/departments").then((response) => {
                        this.componentProps['departments'] = response.data.data;

                        console.log('getSettings',this.componentProps);
                    });
                })
                .then(() => {
                    axios.get("/admin/departments").then((response) => {
                        this.componentProps['navigation'] = response.data.data;
                    });
                });
        },

        updateFormData(formData) {
            console.log('updateFormData', formData);

            this.formData = formData;

            this.showSaveButton = true
        },

        updateSettings() {
            console.log('updateSettings', this.formData);

            const formData = new FormData();

            Object.keys(this.formData).forEach( (key) => {
                formData.append(key, this.formData[key])
            })

            const headers = { 'Content-Type': 'multipart/form-data' };

            axios.post('/admin/settings', formData, { headers }).then(response => {
                response.data.data.forEach(setting => {
                    this.componentProps[setting.key] = setting.value;
                });
            });
        }
    },

    mounted() {
        console.log('Component mounted.');

        this.getSettings();
    },
}
</script>

