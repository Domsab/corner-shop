<template>

    <div class="grid grid-cols-4 gap-6 mt-6">
        <div class="col-span-4 sm:col-span-2">
        <label for="site-name" class="block text-sm font-medium text-gray-700">Facebook</label>
        <input v-model="form.social_facebook" type="text" name="site-name" id="site-name" autocomplete="cc-given-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
        </div>

        <div class="col-span-4 sm:col-span-2">
        <label for="site-title" class="block text-sm font-medium text-gray-700">Twitter</label>
        <input v-model="form.social_twitter" type="text" name="site-title" id="site-title" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
        </div>

        <div class="col-span-4 sm:col-span-2">
        <label for="email-address" class="block text-sm font-medium text-gray-700">Instagram</label>
        <input v-model="form.social_instagram" type="text" name="email-address" id="email-address" autocomplete="email" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
        </div>

        <div class="col-span-4 sm:col-span-2">
        <label for="currency-code" class="block text-sm font-medium text-gray-700">LinkedIn</label>
        <input v-model="form.social_linkedin" type="text" name="email-address" id="email-address" autocomplete="email" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
        </div>
    </div>

</template>

<script>

export default {
    name: "Social Settings",

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
                social_facebook: this.settings.social_facebook,
                social_instagram: this.settings.social_instagram,
                social_twitter: this.settings.social_twitter,
                social_linkedin: this.settings.social_linkedin,
            },
        }
    },

}

</script>
