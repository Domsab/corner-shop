<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <TransitionRoot as="template" :show="open">
    <Dialog as="div" class="fixed inset-0 z-10 overflow-y-auto" @close="open = false">
      <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

        <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
          <DialogOverlay class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" />
        </TransitionChild>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen lg:max-w-6xl lg:mx-auto" aria-hidden="true">&#8203;</span>
        <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

          <div class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:w-3/6 sm:p-6">
            <div class="sm:items-start">
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">

                <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900">
                    <slot name="header">Header</slot>
                </DialogTitle>

                <div v-if="tabs.length !== 0" class="mt-6">
                    <div class="lg:hidden">
                        <label for="selected-tab" class="sr-only">Select a tab</label>
                        <select id="selected-tab" name="selected-tab" class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                            <option
                                v-for="tab in tabs"
                                :key="tab.name"
                                @click="switchComponents(tab)"
                                :selected="activeTab === tab.name"
                            >{{ tab.name }}</option>
                        </select>
                    </div>
                    <div class="hidden lg:block">
                        <div class="border-b border-gray-200">
                            <nav class="flex -mb-px space-x-8">
                                <a
                                    v-for="tab in tabs"
                                    :key="tab.name"
                                    :href="tab.href"
                                    @click="switchComponents(tab)"
                                    :class="[activeTab === tab.name ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700', 'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm']"
                                >{{ tab.name }}</a>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="mt-2">
                    <slot name="body">Content</slot>
                </div>
              </div>
            </div>

            <div v-if="showButtons" class="col-span-4">
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm" @click="$emit('close')">
                        OK
                    </button>
                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" @click="$emit('close')" ref="cancelButtonRef">
                        Cancel
                    </button>
                </div>
            </div>

            <slot name="extras"></slot>
          </div>
        </TransitionChild>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script>
import { ref } from 'vue'
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'

export default {
    components: {
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
    },

    setup() {
        const open = ref(true)

        return {
        open,
        }
    },

    props: {
        hideButtons: {
            type: Boolean,
            default: false,
        },
        tabs: {
            type: Array,
            default: [],
        },
        activeTab: {
            type: String,
            default: '',
        },
        showButtons: {
            type: Boolean,
            default: true,
        },
    },

    methods: {
        switchComponents(tab) {
            this.$emit('switchComponents', tab);
        },

        ok() {
            this.$emit('switchComponents', tab);
        },

        cancel() {

        },
    }
}
</script>
