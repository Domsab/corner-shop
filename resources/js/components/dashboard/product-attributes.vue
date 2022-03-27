<template>
    <div class="px-4 mt-4 first-line:mt-8 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
            <div>
                <h2 id="payment-details-heading" class="text-lg font-medium leading-6 text-gray-900"> Attributes </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Select an attribute to modify its values for this product.
                </p>
            </div>

            <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
                <section aria-labelledby="payment-details-heading">

                    <div class="col-span-2 sm:col-span-2">
                        <label for="location" class="block text-sm font-medium text-gray-700"> Select Attribute </label>
                        <select id="location" name="location" class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>United States</option>
                            <option selected="">Canada</option>
                            <option>Mexico</option>
                        </select>
                    </div>

                    <attribute-values :attributeData='attribute' />
                </section>
            </div>
        </div>
</template>


<script>
import axios from 'axios';

import attributeValues from '../../components/dashboard/attribute-values.vue';

export default {
    name: "Social Settings",

    components:{
        attributeValues,
    },

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
        get() {
            axios.get().then((response) => {
                console.log(response);
            })
        },

        submit(){
            this.$emit('submitForm', this.formData);
        }
    }
}

</script>
