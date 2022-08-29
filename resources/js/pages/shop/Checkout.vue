<template>
    <div class="bg-gray-50">
        <div
            class="max-w-2xl px-4 pt-16 pb-24 mx-auto sm:px-6 lg:max-w-7xl lg:px-8"
        >
            <div class="grid items-center grid-cols-4">
                <a href="/">
                    <span class="sr-only">Workflow</span>
                    <img
                        class="w-auto h-8"
                        src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600"
                        alt=""
                    />
                </a>
            </div>

            <form class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
                <div>
                    <div class="">
                        <RadioGroup v-model="selectedDeliveryMethod">
                            <RadioGroupLabel
                                class="text-lg font-medium text-gray-900"
                            >
                                Delivery method
                            </RadioGroupLabel>

                            <div
                                class="grid grid-cols-1 mt-4 gap-y-6 sm:grid-cols-2 sm:gap-x-4"
                            >
                                <RadioGroupOption
                                    as="template"
                                    v-for="deliveryMethod in deliveryMethods"
                                    :key="deliveryMethod.id"
                                    :value="deliveryMethod"
                                    v-slot="{ checked, active }"
                                >
                                    <div
                                        :class="[
                                            checked
                                                ? 'border-transparent'
                                                : 'border-gray-300',
                                            active
                                                ? 'ring-2 ring-indigo-500'
                                                : '',
                                            'relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none',
                                        ]"
                                    >
                                        <span class="flex flex-1">
                                            <span class="flex flex-col">
                                                <RadioGroupLabel
                                                    as="span"
                                                    class="block text-sm font-medium text-gray-900"
                                                >
                                                    {{ deliveryMethod.title }}
                                                </RadioGroupLabel>
                                                <RadioGroupDescription
                                                    as="span"
                                                    class="flex items-center mt-1 text-sm text-gray-500"
                                                >
                                                    {{
                                                        deliveryMethod.turnaround
                                                    }}
                                                </RadioGroupDescription>
                                                <RadioGroupDescription
                                                    as="span"
                                                    class="mt-6 text-sm font-medium text-gray-900"
                                                >
                                                    {{ deliveryMethod.price }}
                                                </RadioGroupDescription>
                                            </span>
                                        </span>
                                        <CheckCircleIcon
                                            v-if="checked"
                                            class="w-5 h-5 text-indigo-600"
                                            aria-hidden="true"
                                        />
                                        <span
                                            :class="[
                                                active ? 'border' : 'border-2',
                                                checked
                                                    ? 'border-indigo-500'
                                                    : 'border-transparent',
                                                'absolute -inset-px rounded-lg pointer-events-none',
                                            ]"
                                            aria-hidden="true"
                                        />
                                    </div>
                                </RadioGroupOption>
                            </div>
                        </RadioGroup>
                    </div>

                    <div class="pt-10 mt-10 border-t border-gray-200">
                        <RadioGroup v-model="selectedDeliveryAddress">
                            <RadioGroupLabel
                                class="text-lg font-medium text-gray-900"
                            >
                                Delivery Address
                            </RadioGroupLabel>

                            <div class="grid grid-cols-1 mt-4 gap-y-6 gap-x-4">
                                <RadioGroupOption
                                    as="template"
                                    v-for="deliveryMethod in deliveryAddress"
                                    :key="deliveryMethod.id"
                                    :value="deliveryMethod"
                                    v-slot="{ checked, active }"
                                >
                                    <div
                                        :class="[
                                            checked
                                                ? 'border-transparent'
                                                : 'border-gray-300',
                                            active
                                                ? 'ring-2 ring-indigo-500'
                                                : '',
                                            'relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none',
                                        ]"
                                    >
                                        <span class="flex flex-1">
                                            <span class="flex flex-col">
                                                <RadioGroupLabel
                                                    as="span"
                                                    class="block text-sm font-medium text-gray-900"
                                                >
                                                    {{ deliveryMethod.title }}
                                                </RadioGroupLabel>
                                                <RadioGroupDescription
                                                    as="span"
                                                    class="flex items-center mt-1 text-sm text-gray-500"
                                                >
                                                    {{
                                                        deliveryMethod.turnaround
                                                    }}
                                                </RadioGroupDescription>
                                                <RadioGroupDescription
                                                    as="span"
                                                    class="mt-6 text-sm font-medium text-gray-900"
                                                >
                                                    {{ deliveryMethod.price }}
                                                </RadioGroupDescription>
                                            </span>
                                        </span>
                                        <CheckCircleIcon
                                            v-if="checked"
                                            class="w-5 h-5 text-indigo-600"
                                            aria-hidden="true"
                                        />
                                        <span
                                            :class="[
                                                active ? 'border' : 'border-2',
                                                checked
                                                    ? 'border-indigo-500'
                                                    : 'border-transparent',
                                                'absolute -inset-px rounded-lg pointer-events-none',
                                            ]"
                                            aria-hidden="true"
                                        />
                                    </div>
                                </RadioGroupOption>
                            </div>
                        </RadioGroup>
                    </div>

                    <div class="px-4 py-6 sm:px-6">
                        <button
                            @click="modal.show = true"
                            class="w-full px-4 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500"
                        >
                            Add address
                        </button>
                    </div>
                </div>

                <!-- Order summary -->
                <div class="mt-10 lg:mt-0">
                    <h2 class="text-lg font-medium text-gray-900">
                        Order summary
                    </h2>

                    <div
                        class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm"
                    >
                        <h3 class="sr-only">Items in your cart</h3>
                        <ul role="list" class="divide-y divide-gray-200">
                            <li
                                v-for="product in shoppingBag.items"
                                :key="product.id"
                                class="flex px-4 py-6 sm:px-6"
                            >
                                <div class="flex-shrink-0">
                                    <img
                                        :src="product.imageSrc"
                                        :alt="product.imageAlt"
                                        class="w-20 rounded-md"
                                    />
                                </div>

                                <div class="flex flex-col flex-1 ml-6">
                                    <div class="flex">
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-sm">
                                                <a
                                                    :href="product.href"
                                                    class="font-medium text-gray-700 hover:text-gray-800"
                                                >
                                                    {{ product.name }}
                                                </a>
                                            </h4>
                                            <p
                                                class="mt-1 text-sm text-gray-500"
                                            >
                                                {{ product.color }}
                                            </p>
                                            <p
                                                class="mt-1 text-sm text-gray-500"
                                            >
                                                {{ product.size }}
                                            </p>
                                        </div>

                                        <div
                                            class="flex-shrink-0 flow-root ml-4"
                                        >
                                            <button
                                                type="button"
                                                @click="
                                                    removeItemFromBag(
                                                        product.bagId
                                                    )
                                                "
                                                class="-m-2.5 bg-white p-2.5 flex items-center justify-center text-gray-400 hover:text-gray-500"
                                            >
                                                <span class="sr-only"
                                                    >Remove</span
                                                >
                                                <TrashIcon
                                                    class="w-5 h-5"
                                                    aria-hidden="true"
                                                />
                                            </button>
                                        </div>
                                    </div>

                                    <div
                                        class="flex items-end justify-between flex-1 pt-2"
                                    >
                                        <p
                                            class="mt-1 text-sm font-medium text-gray-900"
                                        >
                                            {{ product.price }}
                                        </p>

                                        <div class="ml-4">
                                            <label
                                                for="quantity"
                                                class="sr-only"
                                                >Quantity</label
                                            >
                                            <select
                                                id="quantity"
                                                name="quantity"
                                                class="text-base font-medium text-left text-gray-700 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            >
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <dl
                            class="px-4 py-6 space-y-6 border-t border-gray-200 sm:px-6"
                        >
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Available XO</dt>
                                <dd class="text-sm font-medium text-gray-900">
                                    64.00
                                </dd>
                            </div>
                            <div class="w-full">
                                <label
                                    for="range"
                                    class="font-bold text-gray-600"
                                    >Redeem XO</label
                                >
                                <input
                                    type="range"
                                    name="range"
                                    class="w-full h-2 bg-blue-100 appearance-none"
                                />
                            </div>
                        </dl>

                        <dl
                            class="px-4 py-6 space-y-6 border-t border-gray-200 sm:px-6"
                        >
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Subtotal</dt>
                                <dd class="text-sm font-medium text-gray-900">
                                    $64.00
                                </dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Shipping</dt>
                                <dd class="text-sm font-medium text-gray-900">
                                    $5.00
                                </dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Taxes</dt>
                                <dd class="text-sm font-medium text-gray-900">
                                    $5.52
                                </dd>
                            </div>
                            <div
                                class="flex items-center justify-between pt-6 border-t border-gray-200"
                            >
                                <dt class="text-base font-medium">Total</dt>
                                <dd class="text-base font-medium text-gray-900">
                                    $75.52
                                </dd>
                            </div>
                        </dl>

                        <div class="px-4 pt-6 border-t border-gray-200 sm:px-6">
                            <button
                                type="submit"
                                class="w-full px-4 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500"
                            >
                                Confirm order
                            </button>
                        </div>
                        <div
                            class="flex justify-center pb-6 mt-6 text-sm text-center text-gray-500"
                        >
                            <p>
                                or
                                <button
                                    type="button"
                                    class="font-medium text-indigo-600 hover:text-indigo-500"
                                    @click="$emit('close')"
                                >
                                    Continue Shopping<span aria-hidden="true">
                                        &rarr;</span
                                    >
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <Modal
            :show="modal.show"
            :showButtons="false"
            @switchModalComponents="switchModalComponents"
            @close="modal.show = false"
        >
            <template #header>
                <div>
                    <h2
                        id="payment-details-heading"
                        class="text-lg font-medium leading-6 text-gray-900"
                    >
                        Add Address
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">Subheader</p>
                </div>
            </template>

            <template #body>
                <div class="pt-10 mt-10 border-t border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">
                        Shipping information
                    </h2>

                    <div
                        class="grid grid-cols-1 mt-4 gap-y-6 sm:grid-cols-2 sm:gap-x-4"
                    >
                        <div>
                            <label
                                for="first-name"
                                class="block text-sm font-medium text-gray-700"
                                >First name</label
                            >
                            <div class="mt-1">
                                <input
                                    type="text"
                                    id="first-name"
                                    name="first-name"
                                    autocomplete="given-name"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                />
                            </div>
                        </div>

                        <div>
                            <label
                                for="last-name"
                                class="block text-sm font-medium text-gray-700"
                                >Last name</label
                            >
                            <div class="mt-1">
                                <input
                                    type="text"
                                    id="last-name"
                                    name="last-name"
                                    autocomplete="family-name"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                />
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label
                                for="company"
                                class="block text-sm font-medium text-gray-700"
                                >Company</label
                            >
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="company"
                                    id="company"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                />
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label
                                for="address"
                                class="block text-sm font-medium text-gray-700"
                                >Address</label
                            >
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="address"
                                    id="address"
                                    autocomplete="street-address"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                />
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label
                                for="apartment"
                                class="block text-sm font-medium text-gray-700"
                                >Apartment, suite, etc.</label
                            >
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="apartment"
                                    id="apartment"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                />
                            </div>
                        </div>

                        <div>
                            <label
                                for="city"
                                class="block text-sm font-medium text-gray-700"
                                >City</label
                            >
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="city"
                                    id="city"
                                    autocomplete="address-level2"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                />
                            </div>
                        </div>

                        <div>
                            <label
                                for="country"
                                class="block text-sm font-medium text-gray-700"
                                >Country</label
                            >
                            <div class="mt-1">
                                <select
                                    id="country"
                                    name="country"
                                    autocomplete="country-name"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                >
                                    <option>United States</option>
                                    <option>Canada</option>
                                    <option>Mexico</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label
                                for="region"
                                class="block text-sm font-medium text-gray-700"
                                >State / Province</label
                            >
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="region"
                                    id="region"
                                    autocomplete="address-level1"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                />
                            </div>
                        </div>

                        <div>
                            <label
                                for="postal-code"
                                class="block text-sm font-medium text-gray-700"
                                >Postal code</label
                            >
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="postal-code"
                                    id="postal-code"
                                    autocomplete="postal-code"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                />
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label
                                for="phone"
                                class="block text-sm font-medium text-gray-700"
                                >Phone</label
                            >
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="phone"
                                    id="phone"
                                    autocomplete="tel"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </Modal>
    </div>
</template>

<script>
import { ref } from "vue";
import Modal from "../components/Modal.vue";
import { CheckCircleIcon, TrashIcon } from "@heroicons/vue/solid";
import {
    RadioGroup,
    RadioGroupDescription,
    RadioGroupLabel,
    RadioGroupOption,
} from "@headlessui/vue";

import { useUserStore } from "../stores/user.js";

import { useShoppingCartStore } from "../stores/shopping-cart.js";

const modal = {
    show: false,
};

const deliveryMethods = [
    {
        id: 1,
        title: "Standard",
        turnaround: "4-10 business days",
        price: "$5.00",
    },
    {
        id: 2,
        title: "Express",
        turnaround: "2-5 business days",
        price: "$16.00",
    },
];

const deliveryAddress = [
    {
        id: 1,
        title: "Standard",
        turnaround: "4-10 business days",
        price: "$5.00",
    },
    {
        id: 2,
        title: "Express",
        turnaround: "2-5 business days",
        price: "$16.00",
    },
];

const paymentMethods = [
    { id: "credit-card", title: "Credit card" },
    { id: "paypal", title: "PayPal" },
    { id: "etransfer", title: "eTransfer" },
];

export default {
    components: {
        Modal,
        RadioGroup,
        RadioGroupDescription,
        RadioGroupLabel,
        RadioGroupOption,
        CheckCircleIcon,
        TrashIcon,
    },

    setup(props) {
        const userStore = useUserStore();
        const shoppingBag = useShoppingCartStore();

        const selectedDeliveryMethod = ref(deliveryMethods[0]);
        const selectedDeliveryAddress = ref(deliveryAddress[0]);

        function removeItemFromBag(bagId) {
            shoppingBag.removeItem(bagId);
        }

        return {
            selectedDeliveryMethod,
            deliveryMethods,
            selectedDeliveryAddress,
            deliveryAddress,
            modal,
            shoppingBag,
            removeItemFromBag,
        };
    },
};
</script>
