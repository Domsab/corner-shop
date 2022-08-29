<template>

    <div class="grid grid-cols-4 gap-6 mt-6">
        <div class="col-span-2">
            <label for="site-name" class="block text-sm font-medium text-gray-700">Site name</label>
            <input
                type="text"
                name="site-name"
                id="site-name"
                v-model="form.site_name"
                autocomplete="cc-given-name"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
        </div>

        <div class="col-span-2">
            <label for="site-title" class="block text-sm font-medium text-gray-700">Site title</label>
            <input
                type="text"
                name="site-title"
                id="site-title"
                v-model="form.site_title"
                autocomplete="cc-family-name"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
        </div>

        <div class="col-span-1">
            <ImageUpload
                label="Site Logo"
                name="site-logo"
                :currentImage="form.site_logo"
                @updateImage="updateLogo"/>
        </div>

        <div class="col-span-1">
            <ImageUpload
                label="Site Favicon"
                name="site-favicon"
                :currentImage="form.site_favicon"
                @updateImage="updateFavicon" />
        </div>

        <div class="col-span-2">
            <label for="email-address" class="block text-sm font-medium text-gray-700">Default Email address</label>
            <input
                type="text"
                name="email-address"
                id="email-address"
                v-model="form.default_email_address"
                autocomplete="email"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />

            <label for="currency-code" class="block text-sm font-medium text-gray-700">Currency</label>
            <input
                type="text"
                name="currency-code"
                id="currency-code"
                v-model="form.currency_code"
                autocomplete="cc-exp"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />

            <label for="currency-symbol" class="block text-sm font-medium text-gray-700">Currency Symbol</label>
            <select id="currency-symbol" name="country" v-model="form.currency_symbol" autocomplete="country-name" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                <option>United States</option>
                <option>Canada</option>
                <option>Mexico</option>
            </select>
        </div>

    </div>

</template>

<script>

import ImageUpload from '../form/image-upload.vue'

export default {
    name: "General Settings",

    components: { ImageUpload },

    props: {
        settings: {
            type: Array,
            default: [],
        },
    },

    watch: {
        form: {
            handler() { this.$emit('updateFormData', this.form) },
            deep: true,
        }
    },

    data(){
        return {
            form: {
                site_name: this.settings.site_name,
                site_title: this.settings.site_title,
                default_email_address: this.settings.default_email_address,
                currency_code: this.settings.currency_code,
                currency_symbol: this.settings.currency_symbol,
                site_logo: this.settings.site_logo,
                site_favicon: this.settings.site_favicon,
            },
        }
    },

    methods: {
        updateLogo(image) {
            this.form.site_logo = image
        },

        updateFavicon(image) {
            this.form.site_favicon = image
        },
    },

}

</script>
