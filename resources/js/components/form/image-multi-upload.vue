<template>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-full">
            <label
                for="cover-photo"
                class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"
            >
                {{ label }}
            </label>
        </div>

        <div class="col-span-4">
            <div
                class="flex justify-center h-32 max-w-full px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md"
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
                            for="logo-upload"
                            class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500"
                        >
                            <span> Upload a file </span>
                            <span class="text-xs text-gray-500">
                                PNG, JPG, GIF up to 10MB
                            </span>
                            <input
                                @change="selectImage($event)"
                                accept="image/*"
                                id="logo-upload"
                                name="logo"
                                type="file"
                                class="sr-only"
                            />
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-8">
            <div
                v-for="image in previewImages"
                :key="image.key"
                class="flex flex-row-reverse border-b-2 border-gray-300"
            >
                <span class="relative z-0 inline-flex w-full">
                    <div class="w-full mr-2">
                        <img :src="`${image.full_path}`" class="w-20 h-20 m-2" />
                    </div>
                    <div class="">Image name</div>
                    <div class="col-span-1">
                        <button
                            type="button"
                            @click="showDeleteModal(product)"
                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white focus:z-10"
                        >
                            <TrashIcon
                                class="w-4 h-6 text-red-600"
                                aria-hidden="true"
                            />
                        </button>
                    </div>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
import { ref, watch } from "vue";
import { TrashIcon } from "@heroicons/vue/solid";
export default {
    name: "image-upload",

    components: { TrashIcon },

    props: {
        label: String,
        currentImages: Array,
    },

    setup(props) {
        const previewImages = ref(props.currentImages);

        function selectImage($event) {
            const target = $event.target;

            if (target && target.files) {
                let reader = new FileReader();

                reader.onload = (e) => {

                    previewImages.value.push({full_path: e.target.result});
                    console.log(previewImages.value);
                };
                console.log(target.files[0]);

                reader.readAsDataURL(target.files[0]);
            }
        }

        return {
            selectImage,
            previewImages,
        };
    },
};
</script>
