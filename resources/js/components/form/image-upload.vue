<template>
    <div class="grid grid-cols-4">
        <div class="col-span-4 sm:col-span-4">
            <label
                for="cover-photo"
                class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"
            >
                {{ label }}
            </label>

            <div class="col-span-4 mt-2">
                <div
                    class="flex justify-center max-w-full px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md h-52"
                >
                    <div v-if="previewImage" class="space-y-1 text-center">
                        <img class="inline-block h-40" :src="`img/${previewImage}`" alt="" />

                        <a @click="removeImage" class="text-xs text-gray-500 cursor-pointer">
                            Remove file
                        </a>
                    </div>
                    <div v-else class="space-y-1 text-center">
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
                                :for="name"
                                class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500"
                            >
                                <span> Upload a file </span>
                                <span class="text-xs text-gray-500"> PNG, JPG, GIF up to 10MB </span>
                                <input
                                    @change="selectImage($event)"
                                    accept="image/*"
                                    :id="name"
                                    :name="name"
                                    type="file"
                                    class="sr-only"
                                />
                            </label>
                            <!-- <p class="pl-1">or drag and drop</p> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import { ref } from "vue";
export default {
    name: "image-upload",
    props: {
        label: String,
        name: String,
        currentImage: String
    },

    setup( props, ctx ) {
        const previewImage = ref(props.currentImage);

        function selectImage($event) {
            const target = $event.target;

            if (target && target.files) {
                let reader = new FileReader();

                reader.onload = (e) => {
                    previewImage.value = e.target.result;
                };
                ctx.emit('updateImage', target.files[0])
                reader.readAsDataURL(target.files[0]);
            }
        }

        function removeImage() {
            console.log('remove image')
            previewImage.value = ''
            ctx.emit('updateImage', '')
        }

        return {
            selectImage,
            removeImage,
            previewImage,
        };
    },
};
</script>
