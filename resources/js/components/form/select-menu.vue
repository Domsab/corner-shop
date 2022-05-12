<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <Listbox as="div" v-model="selected">
        <ListboxLabel class="block text-sm font-medium text-gray-700">
            Assigned to
        </ListboxLabel>
        <div class="relative mt-1">
            <ListboxButton
                class="relative w-full py-2 pl-3 pr-10 text-left bg-white border border-gray-300 rounded-md shadow-sm cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            >
                <span class="block truncate">{{ selected.name }}</span>
                <span
                    class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none"
                >
                    <SelectorIcon
                        class="w-5 h-5 text-gray-400"
                        aria-hidden="true"
                    />
                </span>
            </ListboxButton>

            <transition
                leave-active-class="transition duration-100 ease-in"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <ListboxOptions
                    class="absolute z-10 w-full py-1 mt-1 overflow-auto text-base bg-white rounded-md shadow-lg max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                >
                    <ListboxOption
                        as="template"
                        v-for="option in options"
                        :key="option.id"
                        :value="option"
                        v-slot="{ active, selected }"
                    >
                        <li
                            :class="[
                                active
                                    ? 'text-white bg-indigo-600'
                                    : 'text-gray-900',
                                'cursor-default select-none relative py-2 pl-3 pr-9',
                            ]"
                        >
                            <span
                                :class="[
                                    selected ? 'font-semibold' : 'font-normal',
                                    'block truncate',
                                ]"
                            >
                                {{ option.name }}
                            </span>

                            <span
                                v-if="selected"
                                :class="[
                                    active ? 'text-white' : 'text-indigo-600',
                                    'absolute inset-y-0 right-0 flex items-center pr-4',
                                ]"
                            >
                                <CheckIcon class="w-5 h-5" aria-hidden="true" />
                            </span>
                        </li>
                    </ListboxOption>
                </ListboxOptions>
            </transition>
        </div>
    </Listbox>
</template>

<script>
import { ref, watch, computed } from "vue";
import {
    Listbox,
    ListboxButton,
    ListboxLabel,
    ListboxOption,
    ListboxOptions,
} from "@headlessui/vue";
import { CheckIcon, SelectorIcon } from "@heroicons/vue/solid";

export default {
    components: {
        Listbox,
        ListboxButton,
        ListboxLabel,
        ListboxOption,
        ListboxOptions,
        CheckIcon,
        SelectorIcon,
    },

    props: ["options"],

    setup(props, ctx) {
        let options = ref(props.options);

        const selected = ref(options);

        watch(selected, () => {
            console.log("watcher", selected.value);
            ctx.emit("update", selected.value);
        });

        watch(props.options, () => {
            options = ref(props.options)
            console.log("watcher", options);
            // ctx.emit("update", options);
        });

        return {
            options,
            selected,
        };
    },
};
</script>
