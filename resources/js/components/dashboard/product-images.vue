<template>
    <form>
        <div class="grid grid-cols-4 gap-6 mt-6">
            <div class="col-span-4 sm:col-span-4">
                <label
                    for="cover-photo"
                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"
                >
                    Product Image
                </label>
                <div class="col-span-4 mt-0">
                    <div
                        class="flex justify-center max-w-lg px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md"
                    >
                        <div class="space-y-1 text-center">
                            <svg
                                class="w-12 h-12 mx-auto text-gray-400"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 48 48"
                                aria-hidden="true"
                            >
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label
                                    for="file-upload"
                                    class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500"
                                >
                                    <span>Upload a file</span>
                                    <input
                                        id="file-upload"
                                        name="file-upload"
                                        type="file"
                                        class="sr-only"
                                    />
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG, JPG, GIF up to 10MB
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-span-4">
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
        </div>
    </form>
</template>

<script>
export default {
    name: "Social Settings",

    props: {
        settingsData: {
            type: Array,
            default: [],
        },
    },

    data() {
        return {
            formData: {},
        };
    },

    methods: {
        submit() {
            this.$emit("submitForm", this.formData);
        },
    },
};
</script>
