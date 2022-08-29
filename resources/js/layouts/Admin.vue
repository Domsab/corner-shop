<template>
    <div class="min-h-full">
        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog
                as="div"
                class="fixed inset-0 z-40 flex lg:hidden"
                @close="sidebarOpen = false"
            >
                <TransitionChild
                    as="template"
                    enter="transition-opacity ease-linear duration-300"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="transition-opacity ease-linear duration-300"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <DialogOverlay
                        class="fixed inset-0 bg-gray-600 bg-opacity-75"
                    />
                </TransitionChild>
                <TransitionChild
                    as="template"
                    enter="transition ease-in-out duration-300 transform"
                    enter-from="-translate-x-full"
                    enter-to="translate-x-0"
                    leave="transition ease-in-out duration-300 transform"
                    leave-from="translate-x-0"
                    leave-to="-translate-x-full"
                >
                    <div
                        class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-cyan-700"
                    >
                        <TransitionChild
                            as="template"
                            enter="ease-in-out duration-300"
                            enter-from="opacity-0"
                            enter-to="opacity-100"
                            leave="ease-in-out duration-300"
                            leave-from="opacity-100"
                            leave-to="opacity-0"
                        >
                            <div class="absolute top-0 right-0 pt-2 -mr-12">
                                <button
                                    type="button"
                                    class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                    @click="sidebarOpen = false"
                                >
                                    <span class="sr-only">Close sidebar</span>
                                    <XIcon
                                        class="w-6 h-6 text-white"
                                        aria-hidden="true"
                                    />
                                </button>
                            </div>
                        </TransitionChild>
                        <div class="flex items-center flex-shrink-0 px-4">
                            <img
                                class="w-auto h-8"
                                src="https://tailwindui.com/img/logos/easywire-logo-cyan-300-mark-white-text.svg"
                                alt="Easywire logo"
                            />
                        </div>
                        <nav
                            class="flex-shrink-0 h-full mt-5 overflow-y-auto divide-y divide-cyan-800"
                            aria-label="Sidebar"
                        >
                            <div class="px-2 space-y-1">
                                <a
                                    v-for="item in userNavigation"
                                    :key="item.name"
                                    :href="item.href"
                                    :class="[
                                        item.current
                                            ? 'bg-cyan-800 text-white'
                                            : 'text-cyan-100 hover:text-white hover:bg-cyan-600',
                                        'group flex items-center px-2 py-2 text-base font-medium rounded-md',
                                    ]"
                                    :aria-current="
                                        item.current ? 'page' : undefined
                                    "
                                    @click="switchCompoenent(item.component)"
                                >
                                    <component
                                        :is="item.icon"
                                        class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200"
                                        aria-hidden="true"
                                    />
                                    {{ item.name }}
                                </a>
                            </div>
                            <div class="pt-6 mt-6">
                                <div class="px-2 space-y-1">
                                    <a
                                        v-for="item in adminNavigation"
                                        :key="item.name"
                                        :href="item.href"
                                        class="flex items-center px-2 py-2 text-base font-medium rounded-md group text-cyan-100 hover:text-white hover:bg-cyan-600"
                                    >
                                        <component
                                            :is="item.icon"
                                            class="w-6 h-6 mr-4 text-cyan-200"
                                            aria-hidden="true"
                                        />
                                        {{ item.name }}
                                    </a>
                                </div>
                            </div>
                            <div class="pt-6 mt-6">
                                <div class="px-2 space-y-1">
                                    <a
                                        v-for="item in secondaryNavigation"
                                        :key="item.name"
                                        :href="item.href"
                                        class="flex items-center px-2 py-2 text-base font-medium rounded-md group text-cyan-100 hover:text-white hover:bg-cyan-600"
                                    >
                                        <component
                                            :is="item.icon"
                                            class="w-6 h-6 mr-4 text-cyan-200"
                                            aria-hidden="true"
                                        />
                                        {{ item.name }}
                                    </a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </TransitionChild>
                <div class="flex-shrink-0 w-14" aria-hidden="true">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
            <div
                class="flex flex-col flex-grow pt-5 pb-4 overflow-y-auto bg-cyan-700"
            >
                <div class="flex items-center flex-shrink-0 px-4">
                    <img
                        class="w-auto h-8"
                        src="https://tailwindui.com/img/logos/easywire-logo-cyan-300-mark-white-text.svg"
                        alt="Easywire logo"
                    />
                </div>
                <nav
                    class="flex flex-col flex-1 mt-5 overflow-y-auto divide-y divide-cyan-800"
                    aria-label="Sidebar"
                >

                    <div v-for="navigationMenu in navigation" :key="navigationMenu" class="px-2 py-1 my-1 space-y-1">
                        <router-link
                            v-for="item in navigationMenu"
                            :key="item.name"
                            :to="{name: item.component}"
                            :class="[
                                item.component === activeComponent
                                    ? 'bg-cyan-800 text-white'
                                    : 'text-cyan-100 hover:text-white hover:bg-cyan-600',
                                'group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md',
                            ]"
                            :aria-current="item.current ? 'page' : undefined"
                        >
                            <component
                                :is="item.icon"
                                class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200"
                                aria-hidden="true"
                            />
                            {{ item.name }}
                        </router-link>
                    </div>

                    <div class="px-2 py-1 my-1 space-y-1">
                        <form method="POST" action="/logout">
                        <input type="hidden" name="_token" :value="csrfToken">
                            <button class="flex items-center px-2 py-2 text-sm font-medium leading-6 rounded-md group text-cyan-100 hover:text-white hover:bg-cyan-600">
                                <LogoutIcon
                                    class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200"
                                    aria-hidden="true"
                                />
                                Log Out
                            </button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>

        <div class="flex flex-col flex-1 lg:pl-64">
            <div class="flex-1 pb-8">
                <router-view />
            </div>
        </div>
    </div>
</template>

<script>
import { ref, watch } from "vue";
import {
    Dialog,
    DialogOverlay,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";

import {
    BellIcon,
    ClockIcon,
    CogIcon,
    CreditCardIcon,
    DocumentReportIcon,
    HomeIcon,
    MenuAlt1Icon,
    QuestionMarkCircleIcon,
    ScaleIcon,
    ShieldCheckIcon,
    UserGroupIcon,
    UserIcon,
    UsersIcon,
    LogoutIcon,
    AdjustmentsIcon,
    CollectionIcon,
    LibraryIcon,
    XIcon,
    BriefcaseIcon,
} from "@heroicons/vue/outline";

import {
    CashIcon,
    CheckCircleIcon,
    ChevronDownIcon,
    ChevronRightIcon,
    OfficeBuildingIcon,
    SearchIcon,
} from "@heroicons/vue/solid";

const navigation = [
    [
        { name: "Your Account", icon: UserIcon, component: 'account-profile' },
        { name: "Your Orders", icon: ClockIcon, component: 'account-orders' },
        { name: "Payment Details", icon: CreditCardIcon, component: 'account-orders'},
        { name: "Addresses", icon: HomeIcon, component: 'account-orders' },
    ],
    [
        { name: "Home", icon: LibraryIcon, component: 'admin-dashboard'},
        { name: "Site Settings", icon: CogIcon, component: 'admin-settings' },
        { name: "Products", icon: DocumentReportIcon, component: 'admin-products' },
        { name: "Product Attributes", icon: AdjustmentsIcon, component: 'admin-attributes' },
        { name: "Categories & Collections", icon: CollectionIcon, component: 'admin-categories' },
        { name: "Gemini Programme", icon: ScaleIcon, component: 'admin-gemini-wallet' },
    ],
    [
        { name: "Help", icon: QuestionMarkCircleIcon },
    ],
];

import { useRoute } from "vue-router"

export default {
    components: {
        Dialog,
        DialogOverlay,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        TransitionChild,
        TransitionRoot,
        AdjustmentsIcon,
        BriefcaseIcon,
        LibraryIcon,
        UserIcon,
        LogoutIcon,
        CollectionIcon,
        UsersIcon,
        BellIcon,
        CashIcon,
        CheckCircleIcon,
        ChevronDownIcon,
        ChevronRightIcon,
        MenuAlt1Icon,
        OfficeBuildingIcon,
        SearchIcon,
        XIcon,

    },

    setup() {
        const sidebarOpen = ref(false)

        const activeComponent = ref('home')

        const csrfToken = window.laravel.csrfToken

        const route = useRoute();

        watch(
            () => route.params,
            () => {
                console.log('params', route.name)
            }
        )

        return {
            sidebarOpen,
            navigation,
            csrfToken,
            route,
            activeComponent,
        };
    },
};
</script>
