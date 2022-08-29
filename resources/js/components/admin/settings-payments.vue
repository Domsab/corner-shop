<template>

    <div class="grid grid-cols-4 gap-6 mt-6">
        <div class="col-span-4">
            <label for="country" class="block text-sm font-medium text-gray-700">Stripe Payment Method</label>
            <select v-model="form.stripe_payment_method" id="country" name="country" autocomplete="country-name" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                <option>Enabled</option>
                <option>Disabled</option>
            </select>
        </div>

        <div class="col-span-4">
            <label for="site-name" class="block text-sm font-medium text-gray-700">Key</label>
            <input v-model="form.stripe_key" type="text" name="site-name" id="site-name" autocomplete="cc-given-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
        </div>

        <div class="col-span-4">
            <label for="site-title" class="block text-sm font-medium text-gray-700">Secret Key</label>
            <input v-model="form.stripe_secret_key" type="text" name="site-title" id="site-title" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
        </div>

        <div class="col-span-4">
            <label for="country" class="block text-sm font-medium text-gray-700">PayPal Payment Method</label>
            <select v-model="form.paypal_payment_method" id="country" name="country" autocomplete="country-name" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                <option>Enabled</option>
                <option>Disabled</option>
            </select>
        </div>

        <div class="col-span-4">
            <label for="site-name" class="block text-sm font-medium text-gray-700">Client ID</label>
            <input v-model="form.paypal_client_id" type="text" name="site-name" id="site-name" autocomplete="cc-given-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
        </div>

        <div class="col-span-4">
            <label for="site-title" class="block text-sm font-medium text-gray-700">Secret ID</label>
            <input v-model="form.paypal_secret_id" type="text" name="site-title" id="site-title" autocomplete="cc-family-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
        </div>
    </div>

</template>


<script>

export default {
    name: "Payment Settings",

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
                stripe_payment_method: this.settings.stripe_payment_method,
                stripe_secret_key: this.settings.stripe_secret_key,
                stripe_key: this.settings.stripe_key,
                paypal_payment_method: this.settings.paypal_payment_method,
                paypal_client_id: this.settings.paypal_client_id,
                paypal_secret_i: this.settings.paypal_secret_id
            },
        }
    },

}

</script>
