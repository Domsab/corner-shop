<template>
    <main>
        <div class="bg-white shadow">
            <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                <div
                    class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200"
                >
                    <div class="flex-1 min-w-0">
                        <!-- Profile -->
                        <div class="flex items-center">
                            <img
                                class="hidden w-16 h-16 rounded-full sm:block"
                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.6&w=256&h=256&q=80"
                                alt=""
                            />
                            <div>
                                <div class="flex items-center">
                                    <img
                                        class="w-16 h-16 rounded-full sm:hidden"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.6&w=256&h=256&q=80"
                                        alt=""
                                    />
                                    <h1
                                        class="ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate"
                                    >
                                        Gemini Wallet
                                    </h1>
                                </div>
                                <dl
                                    class="flex flex-col mt-6 sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap"
                                >
                                    <dt class="sr-only">Company</dt>
                                    <dd
                                        class="flex items-center text-sm font-medium text-gray-500 capitalize sm:mr-6"
                                    >
                                        <OfficeBuildingIcon
                                            class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                            aria-hidden="true"
                                        />
                                        Duke street studio
                                    </dd>
                                    <dt class="sr-only">Account status</dt>
                                    <dd
                                        class="flex items-center mt-3 text-sm font-medium text-gray-500 capitalize sm:mr-6 sm:mt-0"
                                    >
                                        <CheckCircleIcon
                                            class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                            aria-hidden="true"
                                        />
                                        Verified account
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="flex mt-6 space-x-3 md:mt-0 md:ml-4">
                        <button
                            type="button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                        >
                            Mint XO Tokens
                        </button>
                        <button
                            type="button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                        >
                            Send XO
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">

            <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-9 gap-5 my-8">
                    <div class="col-span-9">
                        <h2 class="text-lg font-medium leading-6 text-gray-900">
                            Recent activity
                        </h2>
                    </div>

                    <div class="col-span-6 bg-white rounded-lg shadow">
                        <div
                            v-for="card in cards"
                            :key="card.name"
                            class="overflow-hidden "
                        >
                            <div class="p-5">
                                <div class="flex flex-wrap items-center">
                                    <div class="flex-shrink-0">
                                        <component
                                            :is="card.icon"
                                            class="w-6 h-6 text-gray-400"
                                            aria-hidden="true"
                                        />
                                    </div>
                                    <div class="flex-1 w-0 ml-5">
                                        <dl>
                                            <dt
                                                class="text-sm font-medium text-gray-500 truncate"
                                            >
                                                {{ card.name }}
                                            </dt>
                                            <dd>
                                                <div
                                                    class="text-lg font-medium text-gray-900"
                                                >
                                                    {{ card.amount }}
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-span-3">
                        <div class="overflow-hidden bg-white rounded-lg shadow">
                            <div
                            v-for="card in xoCards"
                            :key="card.name"
                            class="overflow-hidden "
                        >
                            <div class="p-5">
                                <div class="flex flex-wrap items-center">
                                    <div class="flex-shrink-0">
                                        <component
                                            :is="card.icon"
                                            class="w-6 h-6 text-gray-400"
                                            aria-hidden="true"
                                        />
                                    </div>
                                    <div class="flex-1 w-0 ml-5">
                                        <dl>
                                            <dt
                                                class="text-sm font-medium text-gray-500 truncate"
                                            >
                                                {{ card.name }}
                                            </dt>
                                            <dd>
                                                <div
                                                    class="text-lg font-medium text-gray-900"
                                                >
                                                    {{ card.amount }}
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>

                        </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Activity table -->
            <div class="hidden sm:block">
                <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
                    <div class="flex flex-col mt-2">
                        <div
                            class="min-w-full overflow-hidden overflow-x-auto align-middle shadow sm:rounded-lg"
                        >
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                        >
                                            Transaction
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50"
                                        >
                                            Amount
                                        </th>
                                        <th
                                            class="hidden px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:block"
                                        >
                                            Status
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50"
                                        >
                                            Date
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-gray-200"
                                >
                                    <tr
                                        v-for="transaction in transactions"
                                        :key="transaction.id"
                                        class="bg-white"
                                    >
                                        <td
                                            class="w-full px-6 py-4 text-sm text-gray-900 max-w-0 whitespace-nowrap"
                                        >
                                            <div class="flex">
                                                <a
                                                    :href="transaction.href"
                                                    class="inline-flex space-x-2 text-sm truncate group"
                                                >
                                                    <CashIcon
                                                        class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500"
                                                        aria-hidden="true"
                                                    />
                                                    <p
                                                        class="text-gray-500 truncate group-hover:text-gray-900"
                                                    >
                                                        {{ transaction.name }}
                                                    </p>
                                                </a>
                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-right text-gray-500 whitespace-nowrap"
                                        >
                                            <span
                                                class="font-medium text-gray-900"
                                                >{{ transaction.amount }}
                                            </span>
                                            {{ transaction.currency }}
                                        </td>
                                        <td
                                            class="hidden px-6 py-4 text-sm text-gray-500 whitespace-nowrap md:block"
                                        >
                                            <span
                                                :class="[
                                                    statusStyles[
                                                        transaction.status
                                                    ],
                                                    'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium capitalize',
                                                ]"
                                            >
                                                {{ transaction.status }}
                                            </span>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-right text-gray-500 whitespace-nowrap"
                                        >
                                            <time
                                                :datetime="transaction.datetime"
                                                >{{ transaction.date }}</time
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Pagination -->
                            <nav
                                class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200 sm:px-6"
                                aria-label="Pagination"
                            >
                                <div class="hidden sm:block">
                                    <p class="text-sm text-gray-700">
                                        Showing
                                        {{ " " }}
                                        <span class="font-medium">1</span>
                                        {{ " " }}
                                        to
                                        {{ " " }}
                                        <span class="font-medium">10</span>
                                        {{ " " }}
                                        of
                                        {{ " " }}
                                        <span class="font-medium">20</span>
                                        {{ " " }}
                                        results
                                    </p>
                                </div>
                                <div
                                    class="flex justify-between flex-1 sm:justify-end"
                                >
                                    <a
                                        href="#"
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50"
                                    >
                                        Previous
                                    </a>
                                    <a
                                        href="#"
                                        class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50"
                                    >
                                        Next
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>

import GeminiTransfer from "../../components/admin/gemini-transfer.vue"
import GeminiMinter from "../../components/admin/gemini-minter.vue"
import {
    CashIcon,
    CheckCircleIcon,
    ChevronDownIcon,
    ChevronRightIcon,
    OfficeBuildingIcon,
    SearchIcon,
    ScaleIcon,
    ClockIcon,
} from "@heroicons/vue/solid";

const cards = [
        {
        name: "Address",
        href: "#",
        icon: ClockIcon,
        amount: "845456456csa465csa465c1sa56c1sa456cs456as4c5sa64c1sa6",
    },
];


const xoCards = [
    {
        name: "XO balance",
        href: "#",
        icon: CashIcon,
        amount: "XO 30,659.45",
    },
    {
        name: "XO Circulation",
        href: "#",
        icon: ScaleIcon,
        amount: "XO 39.45",
    },
    {
        name: "Matic Balance",
        href: "#",
        icon: ClockIcon,
        amount: "1",
    },
];

const tabs = [
  { name: 'Transfer', href: '#', current: true, component:'GeminiTransfer' },
  { name: 'Mint', href: '#', current: false, component:'GeminiMinter' },
]

export default {

    components: {
        CashIcon,
        ScaleIcon,
        ClockIcon,
        GeminiTransfer,
        GeminiMinter,
    },

    setup(){
        return {
            tabs,
            cards,
            xoCards
        }
    },

    data(){
        return{
            activeTab: '',
            activeComponent: '',
        }
    },

    methods: {
        switchComponents(tab){
            this.activeComponent = tab.component;
            this.activeTab = tab.name;
        },
    },
}
</script>
