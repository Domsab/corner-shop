<template>

    <div class="grid grid-cols-4 gap-6 mt-6">
        <div class="sm:col-span-4">
            <label for="description" class="block text-sm font-medium text-blue-gray-900"> Google Analytics </label>
            <div class="mt-1">
                <textarea v-model="form.google_analytics" id="description" name="description" rows="4" class="block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm focus:ring-blue-500 focus:border-blue-500" />
            </div>
            <p class="mt-3 text-sm text-blue-gray-500">Brief description for your profile. URLs are hyperlinked.</p>
        </div>

        <div class="col-span-4 sm:col-span-4">
            <label for="last-name" class="block text-sm font-medium text-gray-700">SEO Meta Title</label>
            <input type="text" name="last-name" id="last-name" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
        </div>

        <div class="sm:col-span-4">
            <label for="description" class="block text-sm font-medium text-blue-gray-900"> Facebook Pixel Code </label>
            <div class="mt-1">
                <textarea v-model="form.facebook_pixels" id="description" name="description" rows="4" class="block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm focus:ring-blue-500 focus:border-blue-500" />
            </div>
            <p class="mt-3 text-sm text-blue-gray-500">Brief description for your profile. URLs are hyperlinked.</p>
        </div>
    </div>

</template>


<script>

export default {
    name: "Analytics Settings",

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
                google_analytics: this.settings.google_analytics,
                facebook_pixels: this.settings.facebook_pixels,
            },
        }
    },

}

</script>
