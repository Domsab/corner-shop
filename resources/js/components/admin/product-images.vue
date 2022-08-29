<template>
    <form>
        <div class="grid grid-cols-12 gap-6 mt-6">

                <div class="col-span-full">
                            <ImageUpload
                                label="Product Images"
                                name="site-logo"
                                :currentImages="this.product.images"
                                @updateImage="updateLogo"/>
                </div>


                <div class="col-span-full">
                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                        <button
                            @click="submit"
                            type="button"
                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                        >
                            Save
                        </button>
                        <button
                            @click="$emit('close')"
                            type="button"
                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                            ref="cancelButtonRef"
                        >
                            Close
                        </button>
                    </div>
                </div>


        </div>
    </form>
</template>

<script>
import ImageUpload from '../form/image-multi-upload.vue';
export default {
    name: "Social Settings",
    components: { ImageUpload },
    props: {
        product: {
            type: Array,
            default: [],
        },
    },
    data() {
        return {
            form: {
                images: []
            },
        };
    },
    methods: {
        submit() {
            this.$emit("submitForm", this.formData)
        },
    },
    mounted() {
        this.form.images = this.product.images
        console.log('images', this.form.images)
    },

};
</script>
