<template>
  <div class="relative bg-white">
    <!-- Background image and overlap -->
    <div aria-hidden="true" class="absolute inset-0 hidden sm:flex sm:flex-col">
      <div class="relative flex-1 w-full bg-gray-800">
        <div class="absolute inset-0 overflow-hidden">
          <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-hero-full-width.jpg" alt="" class="object-cover object-center w-full h-full" />
        </div>
        <div class="absolute inset-0 bg-gray-900 opacity-50" />
      </div>
      <div class="w-full h-32 bg-white md:h-40 lg:h-48" />
    </div>

    <div class="relative max-w-3xl px-4 mx-auto text-center pb-96 sm:pb-0 sm:px-6 lg:px-8">
      <!-- Background image and overlap -->
      <div aria-hidden="true" class="absolute inset-0 flex flex-col sm:hidden">
        <div class="relative flex-1 w-full bg-gray-800">
          <div class="absolute inset-0 overflow-hidden">
            <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-hero-full-width.jpg" alt="" class="object-cover object-center w-full h-full" />
          </div>
          <div class="absolute inset-0 bg-gray-900 opacity-50" />
        </div>
        <div class="w-full h-48 bg-white" />
      </div>
      <div class="relative py-32">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">XO</h1>
        <p class="text-2xl font-bold tracking-tight text-white">Welcome to the next level</p>
        <div class="mt-4 sm:mt-6">
          <a href="#" class="inline-block px-8 py-3 font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700">Shop Collection</a>
        </div>

      </div>
    </div>

    <section aria-labelledby="collection-heading" class="relative -mt-96 sm:mt-0">
      <h2 id="collection-heading" class="sr-only">Collections</h2>
      <div class="grid max-w-md grid-cols-1 px-4 mx-auto gap-y-6 sm:max-w-7xl sm:px-6 sm:grid-cols-3 sm:gap-y-0 sm:gap-x-6 lg:px-8 lg:gap-x-8">
        <div v-for="collection in collections" :key="collection.name" class="relative bg-white rounded-lg shadow-xl group h-96 sm:h-auto sm:aspect-w-4 sm:aspect-h-5">
          <div>
            <div aria-hidden="true" class="absolute inset-0 overflow-hidden rounded-lg">
              <div class="absolute inset-0 overflow-hidden group-hover:opacity-75">
                <img :src="collection.imageSrc" :alt="collection.imageAlt" class="object-cover object-center w-full h-full" />
              </div>
              <div class="absolute inset-0 opacity-50 bg-gradient-to-b from-transparent to-black" />
            </div>
            <div class="absolute inset-0 flex items-end p-6 rounded-lg">
              <div>
                <p aria-hidden="true" class="text-sm text-white">Shop the collection</p>
                <h3 class="mt-1 font-semibold text-white">
                  <a :href="collection.href">
                    <span class="absolute inset-0" />
                    {{ collection.name }}
                  </a>
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

</template>

<script>
const collections = [
  {
    name: "Women's",
    href: '#',
    imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-04-collection-01.jpg',
    imageAlt: 'Woman wearing an off-white cotton t-shirt.',
  },
  {
    name: "Men's",
    href: '#',
    imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-04-collection-02.jpg',
    imageAlt: 'Man wearing a charcoal gray cotton t-shirt.',
  },
  {
    name: 'Desk Accessories',
    href: '#',
    imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-04-collection-03.jpg',
    imageAlt: 'Person sitting at a wooden desk with paper note organizer, pencil and tablet.',
  },
]

export default {
  setup() {
    return {
      collections,
    }
  },
}
</script>
