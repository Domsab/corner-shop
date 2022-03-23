<template>
    <div class="px-4 mt-4 first-line:mt-8 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
            <div>
                <h2 id="payment-details-heading" class="text-lg font-medium leading-6 text-gray-900">Logos</h2>
                <p class="mt-1 text-sm text-gray-500">Update your billing information. Please note that updating your location could affect your tax rates.</p>
            </div>

            <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
            <section aria-labelledby="payment-details-heading">
                <form action="#" method="POST">
                <div class="shadow-lg sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-6 bg-white sm:p-6">

                        <div class="grid grid-cols-4 gap-6 mt-6">

                            <div class="col-span-4">
                                <label for="photo" class="block text-sm font-medium text-blue-gray-900"> Site logo </label>
                                <div class="flex items-center mt-1">
                                    <img class="inline-block w-12 h-12 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2.5&w=256&h=256&q=80" alt="" />
                                    <div class="flex ml-4">
                                    <div class="relative flex items-center px-3 py-2 bg-white border rounded-md shadow-sm cursor-pointer border-blue-gray-300 hover:bg-blue-gray-50 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-blue-gray-50 focus-within:ring-blue-500">
                                        <label for="user-photo" class="relative text-sm font-medium pointer-events-none text-blue-gray-900">
                                        <span>Change</span>
                                        <span class="sr-only"> user photo</span>
                                        </label>
                                        <input id="user-photo" name="user-photo" type="file" class="absolute inset-0 w-full h-full border-gray-300 rounded-md opacity-0 cursor-pointer" />
                                    </div>
                                    <button type="button" class="px-3 py-2 ml-3 text-sm font-medium bg-transparent border border-transparent rounded-md text-blue-gray-900 hover:text-blue-gray-700 focus:outline-none focus:border-blue-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-gray-50 focus:ring-blue-500">Remove</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-4">
                                <label for="photo" class="block text-sm font-medium text-blue-gray-900"> Site Favicon </label>
                                <div class="flex items-center mt-1">
                                    <img class="inline-block w-12 h-12 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2.5&w=256&h=256&q=80" alt="" />
                                    <div class="flex ml-4">
                                    <div class="relative flex items-center px-3 py-2 bg-white border rounded-md shadow-sm cursor-pointer border-blue-gray-300 hover:bg-blue-gray-50 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-blue-gray-50 focus-within:ring-blue-500">
                                        <label for="user-photo" class="relative text-sm font-medium pointer-events-none text-blue-gray-900">
                                        <span>Change</span>
                                        <span class="sr-only"> user photo</span>
                                        </label>
                                        <input id="user-photo" name="user-photo" type="file" class="absolute inset-0 w-full h-full border-gray-300 rounded-md opacity-0 cursor-pointer" />
                                    </div>
                                    <button type="button" class="px-3 py-2 ml-3 text-sm font-medium bg-transparent border border-transparent rounded-md text-blue-gray-900 hover:text-blue-gray-700 focus:outline-none focus:border-blue-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-gray-50 focus:ring-blue-500">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                        <button
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border border-transparent rounded-md shadow-sm hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                            @click.prevent="submit()"
                        >Upload Images</button>
                    </div>
                </div>
                </form>
            </section>
            </div>
        </div>
</template>



<script>

export default {
    name: "Image Settings",

    props: {
        settings: {
            type: Array,
            default: [],
        },
    },

    data(){
        return {
            form: {

            },
        }
    },

    methods: {
        submit(){
            this.$emit('submit', this.form);
        }
    },
    mounted() {
        console.log(this.settings);
    }
}

</script>
