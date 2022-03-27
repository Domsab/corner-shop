<!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>
  <div class="bg-white">
    <!-- Mobile menu -->
    <TransitionRoot as="template" :show="open">
      <Dialog as="div" class="fixed inset-0 z-40 flex lg:hidden" @close="open = false">
        <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
          <DialogOverlay class="fixed inset-0 bg-black bg-opacity-25" />
        </TransitionChild>

        <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
          <div class="relative flex flex-col w-full max-w-xs pb-12 overflow-y-auto bg-white shadow-xl">
            <div class="flex px-4 pt-5 pb-2">
              <button type="button" class="inline-flex items-center justify-center p-2 -m-2 text-gray-400 rounded-md" @click="open = false">
                <span class="sr-only">Close menu</span>
                <XIcon class="w-6 h-6" aria-hidden="true" />
              </button>
            </div>

            <!-- Links -->
            <TabGroup as="div" class="mt-2">
              <div class="border-b border-gray-200">
                <TabList class="flex px-4 -mb-px space-x-8">
                  <Tab as="template" v-for="category in navigation.categories" :key="category.name" v-slot="{ selected }">
                    <button :class="[selected ? 'text-indigo-600 border-indigo-600' : 'text-gray-900 border-transparent', 'flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-medium']">
                      {{ category.name }}
                    </button>
                  </Tab>
                </TabList>
              </div>
              <TabPanels as="template">
                <TabPanel v-for="(category, categoryIdx) in navigation.categories" :key="category.name" class="px-4 pt-10 pb-6 space-y-12">
                  <div class="grid items-start grid-cols-1 gap-y-10 gap-x-6">
                    <div class="grid grid-cols-1 gap-y-10 gap-x-6">
                      <div>
                        <p :id="`mobile-featured-heading-${categoryIdx}`" class="font-medium text-gray-900">Featured</p>
                        <ul role="list" :aria-labelledby="`mobile-featured-heading-${categoryIdx}`" class="mt-6 space-y-6">
                          <li v-for="item in category.featured" :key="item.name" class="flex">
                            <a :href="item.href" class="text-gray-500">
                              {{ item.name }}
                            </a>
                          </li>
                        </ul>
                      </div>
                      <div>
                        <p id="mobile-categories-heading" class="font-medium text-gray-900">Categories</p>
                        <ul role="list" aria-labelledby="mobile-categories-heading" class="mt-6 space-y-6">
                          <li v-for="item in category.categories" :key="item.name" class="flex">
                            <a :href="item.href" class="text-gray-500">
                              {{ item.name }}
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="grid grid-cols-1 gap-y-10 gap-x-6">
                      <div>
                        <p id="mobile-collection-heading" class="font-medium text-gray-900">Collection</p>
                        <ul role="list" aria-labelledby="mobile-collection-heading" class="mt-6 space-y-6">
                          <li v-for="item in category.collection" :key="item.name" class="flex">
                            <a :href="item.href" class="text-gray-500">
                              {{ item.name }}
                            </a>
                          </li>
                        </ul>
                      </div>

                      <div>
                        <p id="mobile-brand-heading" class="font-medium text-gray-900">Brands</p>
                        <ul role="list" aria-labelledby="mobile-brand-heading" class="mt-6 space-y-6">
                          <li v-for="item in category.brands" :key="item.name" class="flex">
                            <a :href="item.href" class="text-gray-500">
                              {{ item.name }}
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </TabPanel>
              </TabPanels>
            </TabGroup>

            <div class="px-4 py-6 space-y-6 border-t border-gray-200">
              <div v-for="page in navigation.pages" :key="page.name" class="flow-root">
                <a :href="page.href" class="block p-2 -m-2 font-medium text-gray-900">{{ page.name }}</a>
              </div>
            </div>

            <div class="px-4 py-6 space-y-6 border-t border-gray-200">
              <div class="flow-root">
                <a href="#" class="block p-2 -m-2 font-medium text-gray-900">Create an account</a>
              </div>
              <div class="flow-root">
                <a href="#" class="block p-2 -m-2 font-medium text-gray-900">Sign in</a>
              </div>
            </div>

            <div class="px-4 py-6 space-y-6 border-t border-gray-200">
              <!-- Currency selector -->
              <form>
                <div class="inline-block">
                  <label for="mobile-currency" class="sr-only">Currency</label>
                  <div class="relative -ml-2 border-transparent rounded-md group focus-within:ring-2 focus-within:ring-white">
                    <select id="mobile-currency" name="currency" class="bg-none border-transparent rounded-md py-0.5 pl-2 pr-5 flex items-center text-sm font-medium text-gray-700 group-hover:text-gray-800 focus:outline-none focus:ring-0 focus:border-transparent">
                      <option v-for="currency in currencies" :key="currency">{{ currency }}</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none">
                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" class="w-5 h-5 text-gray-500">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 8l4 4 4-4" />
                      </svg>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </TransitionChild>
      </Dialog>
    </TransitionRoot>

    <header class="relative">
      <nav aria-label="Top">
        <!-- Top navigation -->
        <div class="bg-gray-900">
          <div class="flex items-center justify-between h-10 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Currency selector -->
            <form class="hidden lg:block lg:flex-1">
              <div class="flex">
                <label for="desktop-currency" class="sr-only">Currency</label>
                <div class="relative -ml-2 bg-gray-900 border-transparent rounded-md group focus-within:ring-2 focus-within:ring-white">
                  <select id="desktop-currency" name="currency" class="bg-none bg-gray-900 border-transparent rounded-md py-0.5 pl-2 pr-5 flex items-center text-sm font-medium text-white group-hover:text-gray-100 focus:outline-none focus:ring-0 focus:border-transparent">
                    <option v-for="currency in currencies" :key="currency">{{ currency }}</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" class="w-5 h-5 text-gray-300">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 8l4 4 4-4" />
                    </svg>
                  </div>
                </div>
              </div>
            </form>

            <p class="flex-1 text-sm font-medium text-center text-white lg:flex-none">Get free delivery on orders over $100</p>

            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
              <a href="#" class="text-sm font-medium text-white hover:text-gray-100">Create an account</a>
              <span class="w-px h-6 bg-gray-600" aria-hidden="true" />
              <a href="#" class="text-sm font-medium text-white hover:text-gray-100">Sign in</a>
            </div>
          </div>
        </div>

        <!-- Secondary navigation -->
        <div class="bg-white">
          <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="border-b border-gray-200">
              <div class="flex items-center justify-between h-16">
                <!-- Logo (lg+) -->
                <div class="hidden lg:flex lg:items-center">
                  <a href="#">
                    <span class="sr-only">Workflow</span>
                    <img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600" alt="" />
                  </a>
                </div>

                <div class="hidden h-full lg:flex">
                  <!-- Mega menus -->
                  <PopoverGroup class="ml-8">
                    <div class="flex justify-center h-full space-x-8">
                      <Popover v-for="(category, categoryIdx) in navigation.categories" :key="category.name" class="flex" v-slot="{ open }">
                        <div class="relative flex">
                          <PopoverButton :class="[open ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-700 hover:text-gray-800', 'relative z-10 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px']">
                            {{ category.name }}
                          </PopoverButton>
                        </div>

                        <transition enter-active-class="transition duration-200 ease-out" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition duration-150 ease-in" leave-from-class="opacity-100" leave-to-class="opacity-0">
                            <PopoverPanel class="absolute inset-x-0 text-sm text-gray-500 top-full">
                            <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                            <div class="absolute inset-0 bg-white shadow top-1/2" aria-hidden="true" />

                            <div class="relative bg-white">
                                <div class="px-8 mx-auto max-w-7xl">
                                <div class="grid grid-cols-2 py-16 gap-y-10 gap-x-8">
                                    <div class="grid grid-cols-2 col-start-2 gap-x-8">
                                    <div v-for="item in category.featured" :key="item.name" class="relative text-base group sm:text-sm">
                                        <div class="overflow-hidden bg-gray-100 rounded-lg aspect-w-1 aspect-h-1 group-hover:opacity-75">
                                        <img :src="item.imageSrc" :alt="item.imageAlt" class="object-cover object-center" />
                                        </div>
                                        <a :href="item.href" class="block mt-6 font-medium text-gray-900">
                                        <span class="absolute inset-0 z-10" aria-hidden="true" />
                                        {{ item.name }}
                                        </a>
                                        <p aria-hidden="true" class="mt-1">Shop now</p>
                                    </div>
                                    </div>
                                    <div class="grid grid-cols-3 row-start-1 text-sm gap-y-10 gap-x-8">
                                    <div v-for="section in category.sections" :key="section.name">
                                        <p :id="`${section.name}-heading`" class="font-medium text-gray-900">
                                        {{ section.name }}
                                        </p>
                                        <ul role="list" :aria-labelledby="`${section.name}-heading`" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                        <li v-for="item in section.items" :key="item.name" class="flex">
                                            <a :href="item.href" class="hover:text-gray-800">
                                            {{ item.name }}
                                            </a>
                                        </li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </PopoverPanel>
                        </transition>
                      </Popover>

                      <a v-for="page in navigation.pages" :key="page.name" :href="page.href" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">{{ page.name }}</a>
                    </div>
                  </PopoverGroup>
                </div>

                <!-- Mobile menu and search (lg-) -->
                <div class="flex items-center flex-1 lg:hidden">
                  <button type="button" class="p-2 -ml-2 text-gray-400 bg-white rounded-md" @click="open = true">
                    <span class="sr-only">Open menu</span>
                    <MenuIcon class="w-6 h-6" aria-hidden="true" />
                  </button>

                  <!-- Search -->
                  <a href="#" class="p-2 ml-2 text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Search</span>
                    <SearchIcon class="w-6 h-6" aria-hidden="true" />
                  </a>
                </div>

                <!-- Logo (lg-) -->
                <a href="#" class="lg:hidden">
                  <span class="sr-only">Workflow</span>
                  <img src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600" alt="" class="w-auto h-8" />
                </a>

                <div class="flex items-center justify-end flex-1">
                  <div class="flex items-center lg:ml-8">
                    <div class="flex space-x-8">
                      <div class="hidden lg:flex">
                        <a href="#" class="p-2 -m-2 text-gray-400 hover:text-gray-500">
                          <span class="sr-only">Search</span>
                          <SearchIcon class="w-6 h-6" aria-hidden="true" />
                        </a>
                      </div>

                      <div class="flex">
                        <a href="#" class="p-2 -m-2 text-gray-400 hover:text-gray-500">
                          <span class="sr-only">Account</span>
                          <UserIcon class="w-6 h-6" aria-hidden="true" />
                        </a>
                      </div>
                    </div>

                    <span class="w-px h-6 mx-4 bg-gray-200 lg:mx-6" aria-hidden="true" />

                    <div class="flow-root">
                      <a href="#" class="flex items-center p-2 -m-2 group">
                        <ShoppingCartIcon class="flex-shrink-0 w-6 h-6 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
                        <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                        <span class="sr-only">items in cart, view bag</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
  </div>
</template>

<script>
import { ref } from 'vue'
import {
  Dialog,
  DialogOverlay,
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
} from '@headlessui/vue'
import { MenuIcon, SearchIcon, ShoppingCartIcon, UserIcon, XIcon } from '@heroicons/vue/outline'

const currencies = ['CAD', 'USD', 'AUD', 'EUR', 'GBP']
const navigation = {
    categories: [
    {
      id: 'women',
      name: 'Women',
      featured: [
        {
          name: 'New Arrivals',
          href: '#',
          imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg',
          imageAlt: 'Models sitting back to back, wearing Basic Tee in black and bone.',
        },
        {
          name: 'Basic Tees',
          href: '#',
          imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg',
          imageAlt: 'Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees.',
        },
      ],
      sections: [
        {
          id: 'clothing',
          name: 'Clothing',
          items: [
            { name: 'Tops', href: '#' },
            { name: 'Dresses', href: '#' },
            { name: 'Pants', href: '#' },
            { name: 'Denim', href: '#' },
            { name: 'Sweaters', href: '#' },
            { name: 'T-Shirts', href: '#' },
            { name: 'Jackets', href: '#' },
            { name: 'Activewear', href: '#' },
            { name: 'Browse All', href: '#' },
          ],
        },
        {
          id: 'brands',
          name: 'Brands',
          items: [
            { name: 'Full Nelson', href: '#' },
            { name: 'My Way', href: '#' },
            { name: 'Re-Arranged', href: '#' },
            { name: 'Counterfeit', href: '#' },
            { name: 'Significant Other', href: '#' },
          ],
        },
      ],
    },
    {
      id: 'men',
      name: 'Men',
      featured: [
        {
          name: 'New Arrivals',
          href: '#',
          imageSrc: 'https://tailwindui.com/img/ecommerce-images/product-page-04-detail-product-shot-01.jpg',
          imageAlt: 'Drawstring top with elastic loop closure and textured interior padding.',
        },
        {
          name: 'Artwork Tees',
          href: '#',
          imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-06.jpg',
          imageAlt:
            'Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt.',
        },
      ],
      sections: [
        {
          id: 'clothing',
          name: 'Clothing',
          items: [
            { name: 'Tops', href: '#' },
            { name: 'Pants', href: '#' },
            { name: 'Sweaters', href: '#' },
            { name: 'T-Shirts', href: '#' },
            { name: 'Jackets', href: '#' },
            { name: 'Activewear', href: '#' },
            { name: 'Browse All', href: '#' },
          ],
        },
        {
          id: 'accessories',
          name: 'Accessories',
          items: [
            { name: 'Watches', href: '#' },
            { name: 'Wallets', href: '#' },
            { name: 'Bags', href: '#' },
            { name: 'Sunglasses', href: '#' },
            { name: 'Hats', href: '#' },
            { name: 'Belts', href: '#' },
          ],
        },
        {
          id: 'brands',
          name: 'Brands',
          items: [
            { name: 'Re-Arranged', href: '#' },
            { name: 'Counterfeit', href: '#' },
            { name: 'Full Nelson', href: '#' },
            { name: 'My Way', href: '#' },
          ],
        },
      ],
    },
  ],
  pages: [
    { name: 'Company', href: '#' },
    { name: 'Stores', href: '#' },
  ],
}

export default {
  components: {
    Dialog,
    DialogOverlay,
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
    MenuIcon,
    SearchIcon,
    ShoppingCartIcon,
    UserIcon,
    XIcon,
  },
  setup() {
    const open = ref(false)

    return {
      currencies,
      navigation,
      open,
    }
  },
}
</script>
