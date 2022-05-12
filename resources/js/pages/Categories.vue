<template>
    <div class="bg-white">
        <div>
            <!-- Mobile filter dialog -->
            <TransitionRoot as="template" :show="mobileFiltersOpen">
                <Dialog
                    as="div"
                    class="fixed inset-0 z-40 flex lg:hidden"
                    @close="mobileFiltersOpen = false"
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
                            class="fixed inset-0 bg-black bg-opacity-25"
                        />
                    </TransitionChild>

                    <TransitionChild
                        as="template"
                        enter="transition ease-in-out duration-300 transform"
                        enter-from="translate-x-full"
                        enter-to="translate-x-0"
                        leave="transition ease-in-out duration-300 transform"
                        leave-from="translate-x-0"
                        leave-to="translate-x-full"
                    >
                        <div
                            class="relative flex flex-col w-full h-full max-w-xs py-4 pb-6 ml-auto overflow-y-auto bg-white shadow-xl"
                        >
                            <div class="flex items-center justify-between px-4">
                                <h2 class="text-lg font-medium text-gray-900">
                                    Filters
                                </h2>
                                <button
                                    type="button"
                                    class="flex items-center justify-center w-10 h-10 p-2 -mr-2 text-gray-400 hover:text-gray-500"
                                    @click="mobileFiltersOpen = false"
                                >
                                    <span class="sr-only">Close menu</span>
                                    <XIcon class="w-6 h-6" aria-hidden="true" />
                                </button>
                            </div>

                            <!-- Filters -->
                            <form class="mt-4">
                                <Disclosure
                                    as="div"
                                    v-for="section in filters"
                                    :key="section.name"
                                    class="pt-4 pb-4 border-t border-gray-200"
                                    v-slot="{ open }"
                                >
                                    <fieldset>
                                        <legend class="w-full px-2">
                                            <DisclosureButton
                                                class="flex items-center justify-between w-full p-2 text-gray-400 hover:text-gray-500"
                                            >
                                                <span
                                                    class="text-sm font-medium text-gray-900"
                                                >
                                                    {{ section.name }}
                                                </span>
                                                <span
                                                    class="flex items-center ml-6 h-7"
                                                >
                                                    <ChevronDownIcon
                                                        :class="[
                                                            open
                                                                ? '-rotate-180'
                                                                : 'rotate-0',
                                                            'h-5 w-5 transform',
                                                        ]"
                                                        aria-hidden="true"
                                                    />
                                                </span>
                                            </DisclosureButton>
                                        </legend>
                                        <DisclosurePanel class="px-4 pt-4 pb-2">
                                            <div class="space-y-6">
                                                <div
                                                    v-for="(
                                                        option, optionIdx
                                                    ) in section.options"
                                                    :key="option.value"
                                                    class="flex items-center"
                                                >
                                                    <input
                                                        :id="`${section.id}-${optionIdx}-mobile`"
                                                        :name="`${section.id}[]`"
                                                        :value="option.value"
                                                        type="checkbox"
                                                        class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                    />
                                                    <label
                                                        :for="`${section.id}-${optionIdx}-mobile`"
                                                        class="ml-3 text-sm text-gray-500"
                                                    >
                                                        {{ option.label }}
                                                    </label>
                                                </div>
                                            </div>
                                        </DisclosurePanel>
                                    </fieldset>
                                </Disclosure>
                            </form>
                        </div>
                    </TransitionChild>
                </Dialog>
            </TransitionRoot>

            <main class="max-w-2xl px-4 mx-auto lg:max-w-7xl">
                <!-- Breadcrumb -->
                <div class="border-b border-gray-200">
                    <nav aria-label="Breadcrumb" class="mx-auto max-w-7xl">
                        <ol
                            role="list"
                            class="flex items-center py-4 space-x-4"
                        >
                            <li>
                                <div class="flex items-center">
                                    <a class="mr-4 text-sm font-medium text-gray-900">
                                        {{ departmentName }}
                                    </a>
                                    <svg
                                        viewBox="0 0 6 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                        class="w-auto h-5 text-gray-300"
                                    >
                                        <path
                                            d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z"
                                            fill="currentColor"
                                        />
                                    </svg>
                                </div>
                            </li>
                            <li class="text-sm">
                                <a
                                    href="#"
                                    aria-current="page"
                                    class="font-medium text-gray-500 hover:text-gray-600"
                                >
                                    {{ parentCategoryName }}
                                </a>
                            </li>

                        </ol>
                    </nav>
                </div>

                <div class="py-6 border-b border-gray-200">
                    <h1 class="text-4xl font-extrabold tracking-tight text-gray-900"> {{categoryName}} </h1>
                    <p class="mt-4 text-base text-gray-500"> {{categoryDescription}} </p>
                </div>

                <div
                    class="pt-12 pb-24 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4"
                >
                    <!-- Filters -->
                    <aside>
                        <h2 class="sr-only">Filters</h2>

                        <button
                            type="button"
                            class="inline-flex items-center lg:hidden"
                            @click="mobileFiltersOpen = true"
                        >
                            <span class="text-sm font-medium text-gray-700"
                                >Filters</span
                            >
                            <PlusSmIcon
                                class="flex-shrink-0 w-5 h-5 ml-1 text-gray-400"
                                aria-hidden="true"
                            />
                        </button>

                        <div class="hidden lg:block">
                            <form class="space-y-10 divide-y divide-gray-200">
                                <div
                                    v-for="(section, sectionIdx) in filters"
                                    :key="section.name"
                                    :class="sectionIdx === 0 ? null : 'pt-10'"
                                >
                                    <fieldset>
                                        <legend
                                            class="block text-sm font-medium text-gray-900"
                                        >
                                            {{ section.name }}
                                        </legend>
                                        <div class="pt-6 space-y-3">
                                            <div
                                                v-for="(
                                                    option, optionIdx
                                                ) in section.options"
                                                :key="option.value"
                                                class="flex items-center"
                                            >
                                                <input
                                                    :id="`${section.id}-${optionIdx}`"
                                                    :name="`${section.id}[]`"
                                                    :value="option.value"
                                                    type="checkbox"
                                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                />
                                                <label
                                                    :for="`${section.id}-${optionIdx}`"
                                                    class="ml-3 text-sm text-gray-600"
                                                >
                                                    {{ option.label }}
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </form>
                        </div>
                    </aside>

                    <section
                        aria-labelledby="product-heading"
                        class="mt-6 lg:mt-0 lg:col-span-2 xl:col-span-3"
                    >
                        <h2 id="product-heading" class="sr-only">Products</h2>

                        <div
                            class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3"
                        >
                            <div
                                v-for="product in products"
                                :key="product.id"
                                class="relative flex flex-col overflow-hidden bg-white border border-gray-200 rounded-lg group"
                            >
                                <div
                                    class="bg-gray-200 aspect-w-3 aspect-h-4 group-hover:opacity-75 sm:aspect-none sm:h-96"
                                >
                                    <img
                                        :src="product.imageSrc"
                                        :alt="product.imageAlt"
                                        class="object-cover object-center w-full h-full sm:w-full sm:h-full"
                                    />
                                </div>
                                <div class="flex flex-col flex-1 p-4 space-y-2">
                                    <h3
                                        class="text-sm font-medium text-gray-900"
                                    >
                                        <a :href="product.href">
                                            <span
                                                aria-hidden="true"
                                                class="absolute inset-0"
                                            />
                                            {{ product.name }}
                                        </a>
                                    </h3>
                                    <p class="text-sm text-gray-500">
                                        {{ product.description }}
                                    </p>
                                    <div
                                        class="flex flex-col justify-end flex-1"
                                    >
                                        <p class="text-sm italic text-gray-500">
                                            {{ product.options }}
                                        </p>
                                        <p
                                            class="text-base font-medium text-gray-900"
                                        >
                                            {{ product.price }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
import { onMounted, ref, watch, computed } from "vue";
import {
    Dialog,
    DialogOverlay,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    Tab,
    TabGroup,
    TabList,
    TabPanel,
    TabPanels,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import {
    MenuIcon,
    SearchIcon,
    ShoppingBagIcon,
    XIcon,
} from "@heroicons/vue/outline";
import { ChevronDownIcon, PlusSmIcon } from "@heroicons/vue/solid";
import axios from "axios";

const filters = [
    {
        id: "color",
        name: "Color",
        options: [
            { value: "white", label: "White" },
            { value: "beige", label: "Beige" },
            { value: "blue", label: "Blue" },
            { value: "brown", label: "Brown" },
            { value: "green", label: "Green" },
            { value: "purple", label: "Purple" },
        ],
    },
    {
        id: "category",
        name: "Category",
        options: [
            { value: "new-arrivals", label: "All New Arrivals" },
            { value: "tees", label: "Tees" },
            { value: "crewnecks", label: "Crewnecks" },
            { value: "sweatshirts", label: "Sweatshirts" },
            { value: "pants-shorts", label: "Pants & Shorts" },
        ],
    },
    {
        id: "sizes",
        name: "Sizes",
        options: [
            { value: "xs", label: "XS" },
            { value: "s", label: "S" },
            { value: "m", label: "M" },
            { value: "l", label: "L" },
            { value: "xl", label: "XL" },
            { value: "2xl", label: "2XL" },
        ],
    },
];

const products = [
    {
        id: 1,
        name: "Basic Tee 8-Pack",
        href: "#",
        price: "$256",
        description:
            "Get the full lineup of our Basic Tees. Have a fresh shirt all week, and an extra for laundry day.",
        options: "8 colors",
        imageSrc:
            "https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-01.jpg",
        imageAlt:
            "Eight shirts arranged on table in black, olive, grey, blue, white, red, mustard, and green.",
    },
    {
        id: 2,
        name: "Basic Tee",
        href: "#",
        price: "$32",
        description:
            "Look like a visionary CEO and wear the same black t-shirt every day.",
        options: "Black",
        imageSrc:
            "https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-02.jpg",
        imageAlt: "Front of plain black t-shirt.",
    },
    // More products...
];

export default {
    components: {
        Dialog,
        DialogOverlay,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Popover,
        PopoverButton,
        PopoverGroup,
        PopoverPanel,
        Tab,
        TabGroup,
        TabList,
        TabPanel,
        TabPanels,
        TransitionChild,
        TransitionRoot,
        ChevronDownIcon,
        MenuIcon,
        PlusSmIcon,
        SearchIcon,
        ShoppingBagIcon,
        XIcon,
    },

    props: ["slug"],

    setup(props) {
        const mobileMenuOpen = ref(false);

        const mobileFiltersOpen = ref(false);

        const slug = computed(() => props.slug);

        const departmentName = ref('')

        const parentCategoryName = ref('');

        const parentCategoryDescription = ref('');

        const categoryName = ref('');

        const categoryDescription = ref('');

        watch(slug, (newSlug, oldSlug) => {
            getProducts(newSlug);
        });

        onMounted(() => {
            getProducts(slug.value);
        });

        function getProducts(categorySlug) {
            axios.get(`/category/${categorySlug}`).then((response) => {
                const data = response.data.data;

                categoryName.value = data.name;
                categoryDescription.value = data.description;
                parentCategoryName.value = data.parent.name;
                parentCategoryDescription.value = data.parent.description;
                departmentName.value = data.parent.department.name;
                products.value = data.products;

                console.log(response.data.data);
            });
        }

        return {
            mobileMenuOpen,
            mobileFiltersOpen,
            departmentName,
            parentCategoryName,
            parentCategoryDescription,
            categoryName,
            categoryDescription,
            products,
            filters,
        };
    },
};
</script>
