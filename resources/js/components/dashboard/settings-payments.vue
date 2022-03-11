<template>
    <div class="px-4 mt-4 first-line:mt-8 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
            <div>
                <h2 id="payment-details-heading" class="text-lg font-medium leading-6 text-gray-900">General</h2>
                <p class="mt-1 text-sm text-gray-500">Update your billing information. Please note that updating your location could affect your tax rates.</p>
            </div>

            <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
            <section aria-labelledby="payment-details-heading">
                <form action="#" method="POST">
                <div class="shadow-lg sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-6 bg-white sm:p-6">

                    <div class="grid grid-cols-4 gap-6 mt-6">
                        <div class="col-span-4">
                        <label for="country" class="block text-sm font-medium text-gray-700">Stripe Payment Method</label>
                        <select id="country" name="country" autocomplete="country-name" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                            <option>Enabled</option>
                            <option>Disabled</option>
                        </select>
                        </div>

                        <div class="col-span-4">
                        <label for="site-name" class="block text-sm font-medium text-gray-700">Key</label>
                        <input type="text" name="site-name" id="site-name" autocomplete="cc-given-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
                        </div>

                        <div class="col-span-4">
                        <label for="site-title" class="block text-sm font-medium text-gray-700">Secret Key</label>
                        <input type="text" name="site-title" id="site-title" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
                        </div>

                        <div class="col-span-4">
                        <label for="country" class="block text-sm font-medium text-gray-700">PayPal Payment Method</label>
                        <select id="country" name="country" autocomplete="country-name" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                            <option>Enabled</option>
                            <option>Disabled</option>
                        </select>
                        </div>

                        <div class="col-span-4">
                        <label for="site-name" class="block text-sm font-medium text-gray-700">Client ID</label>
                        <input type="text" name="site-name" id="site-name" autocomplete="cc-given-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
                        </div>

                        <div class="col-span-4">
                        <label for="site-title" class="block text-sm font-medium text-gray-700">Secret ID</label>
                        <input type="text" name="site-title" id="site-title" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
                        </div>
                    </div>
                    </div>
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                    <button
                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border border-transparent rounded-md shadow-sm hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                        @click.prevent="submit()"
                    >Save</button>
                    </div>
                </div>
                </form>
            </section>
            </div>
        </div>
</template>


<script>

export default {
    name: "Payment Settings",

    props: {
        settingsData: {
            type: Array,
            default: [],
        },
    },

    data(){
        return {
            formData: {

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
