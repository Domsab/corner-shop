<template>
    <main class="flex-1">
        <!-- Page Header -->
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
                                        Product Categories &amp; Collections
                                    </h1>
                                </div>
                                <dl
                                    class="flex flex-col mt-6 sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap"
                                >
                                    <dt class="sr-only">Account status</dt>
                                    <h2
                                        class="flex items-center mt-3 text-sm font-medium text-gray-500 capitalize sm:mr-6 sm:mt-0"
                                    >
                                        <CheckCircleIcon
                                            class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                            aria-hidden="true"
                                        />
                                        A list of product categories and collections
                                    </h2>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="flex mt-6 space-x-3 md:mt-0 md:ml-4">
                        <button
                            @click="showDepartmentModal()"
                            type="button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                        >
                            Create Collection
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Collection tabs -->
        <div class="px-4 mt-8 first-line:mt-8 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
            <div class="hidden lg:block" v-if="collections.length > 0">
                <div class="border-b border-gray-200">
                    <nav class="flex -mb-px space-x-8">
                        <a
                            :class="[
                                tabs.active === 'all'
                                    ? 'border-purple-500 text-purple-600'
                                    : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700',
                                'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm',
                            ]"
                            @click="getAllData()"
                            >All Categories</a
                        >
                        <p
                            class="py-4 text-sm font-medium text-gray-500 border-b-2 border-transparent whitespace-nowrap"
                        >
                            |
                        </p>
                        <a

                            v-for="collection in collections"
                            :key="collection.name"
                            :href="collection.href"
                            @click="setData(collection)"
                            :class="[
                                tabs.active === collection.name
                                    ? 'border-purple-500 text-purple-600'
                                    : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700',
                                'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm',
                            ]"
                            >{{ collection.name }}</a
                        >
                    </nav>
                </div>
            </div>
        </div>

        <div class="px-4 mt-8 first-line:mt-8 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
            <!-- Tab Content -->
            <div class="grid grid-cols-9 gap-5 my-4">

                <!-- Tab Description -->
                <div class="col-span-6 bg-white">
                    <div  class="overflow-hidden">
                        <div v-if="tabs.active === 'all'"  class="p-5">
                            <div class="flex flex-wrap items-center">
                                <div class="flex-1 w-full">
                                    <p class="text-sm font-medium"></p>
                                    <p class="pb-5 text-sm font-medium">Categories are how we group our products and are similar to what you would expect categories to be. Categories can also contain other child collections</p>
                                </div>
                            </div>
                        </div>
                        <div v-else class="p-5">
                            <div class="flex flex-wrap items-center">
                                <div class="flex-1 w-full">
                                    <dl>
                                        <dt
                                            class="text-sm font-medium text-gray-500 truncate"
                                        >
                                            Collection Name:
                                        </dt>
                                        <dd>
                                            <div
                                                class="text-lg font-medium text-gray-900"
                                            >
                                                {{ getDepartmentName }}
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="flex flex-wrap items-center pt-3">
                                <div class="flex-1 w-full">
                                    <dl>
                                        <dt
                                            class="text-sm font-medium text-gray-500 truncate"
                                        >
                                            Description:
                                        </dt>
                                        <dd>
                                            <div
                                                class="text-lg font-medium text-gray-900"
                                            >
                                                {{ getDepartmentDescription }}
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions Card -->
                <div class="col-span-3">
                    <div class="overflow-hidden bg-white rounded-lg shadow">
                        <div class="overflow-hidden">
                            <div class="p-5">
                                <div class="flex flex-wrap items-center">
                                    <div class="flex-1 w-0">
                                        <dl>
                                            <dt
                                                class="text-sm font-medium text-gray-500 truncate"
                                            >
                                                Existing Categories:
                                            </dt>
                                            <dd>
                                                <div
                                                    class="text-lg font-medium text-gray-900"
                                                >
                                                    {{ categories.length }}
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-center pt-3">
                                    <div class="flex-1 w-0">
                                        <dl>
                                            <dt
                                                class="text-sm font-medium text-gray-500 truncate"
                                            >
                                                Related Products:
                                            </dt>
                                            <dd>
                                                <div
                                                    class="text-lg font-medium text-gray-900"
                                                >
                                                    {15}
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>

                                <div class="flex flex-wrap items-center pt-3">
                                    <div class="flex-1 w-full mb-3">
                                        <button
                                            type="button"
                                            @click="showDeleteModal()"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 shadow-sm rounded-l-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                                        >
                                            <TrashIcon
                                                class="w-4 h-6 text-red-600"
                                                aria-hidden="true"
                                            />
                                        </button>

                                        <button
                                            type="button"
                                            @click="showEditDepartmentModal()"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 shadow-sm rounded-r-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                                        >
                                            <PencilIcon
                                                class="w-4 h-6 text-blue-600"
                                                aria-hidden="true"
                                            />
                                        </button>
                                        <span class="px-1" />
                                        <button
                                            @click="showCategoryModal()"
                                            type="button"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500"
                                        >
                                            <PlusCircleIcon
                                                class="w-4 h-6 text-blue-600"
                                                aria-hidden="true"
                                            />
                                            <span span class="pl-2">
                                                Create Category
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!--Category Table -->
            <div class="block">
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
                                        #
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        Name
                                    </th>
                                    <th
                                        class="hidden px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:block"
                                    >
                                        Slug
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        Featured
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        Menu
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    >
                                        Order
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                    ></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Categories -->
                                <template
                                    v-for="category in categories"
                                    :key="category.id"
                                >
                                    <tr class="bg-white">
                                        <td
                                            class="px-6 py-4 text-sm text-gray-900 max-w-0 whitespace-nowrap"
                                        >
                                            <div class="flex">
                                                <p
                                                    class="text-gray-500 truncate group-hover:text-gray-900"
                                                >
                                                    {{ category.id }}
                                                </p>
                                            </div>
                                        </td>
                                        <td
                                            class="w-full px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                        >
                                            {{ category.name }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                        >
                                            {{ category.slug }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                        >
                                            {{ category.featured }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                        >
                                            {{ category.menu }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                        >
                                            {{ category.order }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                        >
                                            <span
                                                class="relative z-0 inline-flex rounded-md shadow-sm"
                                            >
                                                <button
                                                    title="Delete category"
                                                    @click="
                                                        remove(category)
                                                    "
                                                    type="button"
                                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                                                >
                                                    <TrashIcon
                                                        class="w-4 h-6 text-red-600"
                                                        aria-hidden="true"
                                                    />
                                                </button>

                                                <button
                                                    title="Edit category"
                                                    @click="
                                                        showEditCategoryModal(
                                                            category
                                                        )
                                                    "
                                                    type="button"
                                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-x-gray-300 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                                                >
                                                    <PencilIcon
                                                        class="w-4 h-6 text-blue-600"
                                                        aria-hidden="true"
                                                    />
                                                </button>

                                                <button
                                                    title="Create a sub category"
                                                    @click="
                                                        showSubCategoryModal(
                                                            category
                                                        )
                                                    "
                                                    type="button"
                                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                                                >
                                                    <PlusCircleIcon
                                                        class="w-4 h-6 text-blue-600"
                                                        aria-hidden="true"
                                                    />
                                                </button>
                                            </span>
                                        </td>
                                    </tr>

                                    <template
                                        v-if="
                                            category.sub_categories.length >= 1
                                        "
                                    >
                                        <tr
                                            v-for="sub_category in category.sub_categories"
                                            :key="sub_category.id"
                                            class="bg-yellow"
                                        >
                                            <td
                                                class="px-6 py-4 text-sm text-gray-900 max-w-0 whitespace-nowrap"
                                            >
                                                <div class="flex">
                                                    <p
                                                        class="text-gray-500 truncate group-hover:text-gray-900"
                                                    >
                                                        {{ sub_category.id }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td
                                                class="w-full px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                            >
                                                >> {{ sub_category.name }}
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                            >
                                                {{ sub_category.slug }}
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                            >
                                                {{ sub_category.featured }}
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                            >
                                                {{ sub_category.menu }}
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                            >
                                                {{ sub_category.order }}
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm text-left text-gray-500 whitespace-nowrap"
                                            >
                                                <span
                                                    class="relative z-0 inline-flex rounded-md shadow-sm"
                                                >
                                                    <button
                                                        title="Delete sub_category"
                                                        @click="
                                                            remove(
                                                                sub_category
                                                            )
                                                        "
                                                        type="button"
                                                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                                                    >
                                                        <TrashIcon
                                                            class="w-4 h-6 text-red-600"
                                                            aria-hidden="true"
                                                        />
                                                    </button>

                                                    <button
                                                        title="Delete Sub Category"
                                                        @click="
                                                            showEditSubCategoryModal(
                                                                sub_category
                                                            )
                                                        "
                                                        type="button"
                                                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                                                    >
                                                        <PencilIcon
                                                            class="w-4 h-6 text-blue-600"
                                                            aria-hidden="true"
                                                        />
                                                    </button>
                                                </span>
                                            </td>
                                        </tr>
                                    </template>
                                </template>
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

        <Modal
            :show="modal.show"
            :showButtons="false"
            @close="modal.show = false"
        >
            <template #header>
                <div>
                    <h2
                        id="payment-details-heading"
                        class="text-lg font-medium leading-6 text-gray-900"
                    >
                        {{ modal.labels.header }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">
                        {{ modal.labels.subHeader }}
                    </p>
                </div>
            </template>

            <template #body>
                <div v-if="modal.action === 'delete'">
                    <div class="grid grid-cols-4 gap-6 mt-6">
                        <div class="col-span-4 sm:col-span-4">
                            {{ modal.labels.content }}
                        </div>
                    </div>
                    <div class="grid grid-cols-4 gap-6 mt-6">
                        <div class="col-span-4">
                            <div
                                class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse"
                            >
                                <button
                                    type="button"
                                    class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                                    @click="remove()"
                                >
                                    {{ modal.labels.confirm_btn }}
                                </button>
                                <button
                                    type="button"
                                    class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                                    @click="modal.show = false"
                                    ref="cancelButtonRef"
                                >
                                    {{ modal.labels.cancel_btn }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-else>
                    <div v-if="modal.action === 'collections' || 'categories'">
                        <div class="grid grid-cols-4 gap-6 mt-6">
                            <div class="col-span-3">
                                <label
                                    for="last-name"
                                    class="block text-sm font-medium text-gray-700"
                                >
                                    Name
                                </label>
                                <input
                                    v-model="form.name"
                                    type="text"
                                    name="last-name"
                                    id="last-name"
                                    autocomplete="cc-family-name"
                                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                />
                            </div>
                            <div class="col-span-1">
                                <div class="relative flex items-start">
                                    <div class="flex items-center h-5 mt-8">
                                        <input
                                            v-model="form.active"
                                            id="candidates"
                                            aria-describedby="candidates-description"
                                            name="candidates"
                                            type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                        />
                                    </div>
                                    <div class="mt-8 ml-3 text-sm">
                                        <label
                                            for="candidates"
                                            class="font-medium text-gray-700"
                                            >Is active</label
                                        >
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label
                                    for="description"
                                    class="block text-sm font-medium text-blue-gray-900"
                                >
                                    Description
                                </label>
                                <div class="mt-1">
                                    <textarea
                                        v-model="form.description"
                                        id="description"
                                        name="description"
                                        rows="4"
                                        class="block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm focus:ring-blue-500 focus:border-blue-500"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-if="modal.action === 'categories'">
                        <div class="grid grid-cols-4 gap-6 mt-6">
                            <div class="col-span-2">
                                <ImageUpload label="Image"/>
                            </div>
                            <div class="col-span-2">
                                <div class="relative flex items-start">
                                    <div class="flex items-center h-5">
                                        <input
                                            v-model="form.featured"
                                            id="comments"
                                            aria-describedby="comments-description"
                                            name="comments"
                                            type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                        />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label
                                            for="comments"
                                            class="font-medium text-gray-700"
                                            >Featured
                                        </label>
                                        <p
                                            id="comments-description"
                                            class="text-gray-500"
                                        >
                                            Category will appear on the home
                                            page probably.
                                        </p>
                                    </div>
                                </div>

                                <div class="relative flex items-start"></div>
                            </div>
                        </div>




                    </div>

                    <div class="grid grid-cols-4 gap-6 mt-6">
                        <div class="col-span-4">
                            <div
                                class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse"
                            >
                                <button
                                    type="button"
                                    class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                                    @click="save()"
                                >
                                    {{ modal.labels.confirm_btn }}
                                </button>
                                <button
                                    type="button"
                                    class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                                    @click="modal.show = false"
                                    ref="cancelButtonRef"
                                >
                                    {{ modal.labels.cancel_btn }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </Modal>
    </main>
</template>

<script>
import {
    ChevronRightIcon,
    CheckCircleIcon,
    PlusCircleIcon,
    TrashIcon,
    PencilIcon,
    CashIcon,
} from "@heroicons/vue/solid";

import axios from "axios";
import { cloneDeep } from "lodash";
import Modal from "../../components/Modal.vue";
import selectMenu from "../../components/form/select-menu.vue";
import ImageUpload from "../../components/form/image-upload.vue";

export default {
    components: {
    ChevronRightIcon,
    CheckCircleIcon,
    PlusCircleIcon,
    TrashIcon,
    PencilIcon,
    CashIcon,
    Modal,
    selectMenu,
    ImageUpload
},

    computed: {
        collectionOptions() {},

        categoryOptions() {},

        getDepartmentName() {
            return this.collection.name;
        },

        getDepartmentDescription() {
            return this.collection.description;
        },
    },

    data() {
        return {
            collections: [],
            categories: [],
            tabs: {
                active: "all",
                description: "",
            },
            collection: {
                id: "",
                name: "",
                description: "",
            },
            form: {
                id: "",
                name: "",
                description: "",
                active: "",
                parent_id: "",
                collection_id: "",
                featured: "",
                image: "",
            },
            modal: {
                show: false,
                action: "",
                labels: {
                    header: "",
                    content: "",
                    confirm_btn: "Confirm",
                    cancel_btn: "Cancel",
                },
            },
        };
    },

    methods: {
        showDepartmentModal() {
            this.form = {
                id: "",
                name: "",
                description: "",
                active: true,
                parent_id: "",
                collection_id: "",
                featured: 0,
                image: "",
            };

            this.modal.action = "collections";
            this.modal.labels.header = "Create Collection";
            this.modal.labels.confirm_btn = "Create Collection";

            this.modal.show = true;
        },

        showEditDepartmentModal() {
            this.form = cloneDeep(this.collection);

            this.modal.action = "collection";
            this.modal.labels.header = `Edit ${this.collection.name} Department`;
            this.modal.labels.confirm_btn = "Edit Department";

            this.modal.show = true;
        },

        showDeleteModal() {
            this.form = cloneDeep(this.collection);

            this.modal.action = "delete";
            this.modal.labels.header = `Delete ${this.collection.name} Department`;
            this.modal.labels.content =
                "Are you sure? You will also delete any associated categories. This can not be undone.";
            this.modal.labels.confirm_btn = `Delete ${this.collection.name}`;

            this.modal.show = true;
        },

        showCategoryModal() {
            this.form = {
                id: "",
                name: "",
                description: "",
                active: true,
                parent_id: "",
                collection_id: this.collection.id,
                featured: 0,
                image: "",
            };

            this.modal.action = "categories";
            this.modal.labels.header = `Create Category in '${this.collection.name}'`;
            this.modal.labels.confirm_btn = "Create Category";
            this.modal.show = true;
        },

        showEditCategoryModal(category) {
            this.form = cloneDeep(category);

            this.modal.labels.header = "Edit Category";
            this.modal.action = "categories";
            this.modal.show = true;

            this.form.category = category;
        },

        showSubCategoryModal(category) {
            this.modal.labels.header = `Create Sub Category for '${category.name}' in '${this.collection.name}'`;
            this.modal.action = "categories";
            this.modal.labels.confirm_btn = "Create Sub Category";
            this.modal.show = true;

            this.form = {
                id: "",
                name: "",
                description: "",
                active: true,
                parent_id: category.id,
                collection_id: "",
                featured: false,
                image: "",
            };
        },

        showEditSubCategoryModal(category) {
            this.form = cloneDeep(category);

            this.modal.labels.header = "Edit Sub Category:";
            this.modal.action = "categories";
            this.modal.show = true;
        },

        setData(collection) {
            console.log("setData", collection);

            this.tabs.active = collection.name;

            this.collection.id = collection.id;

            this.collection.name = collection.name;

            this.collection.description = collection.description;

            this.categories = collection.categories;
        },

        getCollectionData() {
            axios.get("/admin/collections").then((response) => {
                this.collections = response.data.data;
                console.log("getCollectionData", this.collections);

                // this.setData(this.collections[0]);
            });
        },

        getAllCategories() {
            axios.get("/admin/collections").then((response) => {
                this.collections = response.data.data;
                console.log("getAllCategories", this.collections);

                // this.setData(this.collections[0]);
            });
        },

        save() {
            console.log(
                `/admin/${this.modal.action}/${this.form.id}`,
                this.form
            );

            axios
                .post(
                    `/admin/${this.modal.action}/${this.form.id}`,
                    this.form
                )
                .then((response) => {
                    console.log(
                        "Saved Department response",
                        response.data.data
                    );

                    this.collections = response.data.data;

                    const collection =
                        this.modal.action === "collections"
                            ? this.collections.find(
                                  (item) => item.name === this.form.name
                              )
                            : this.collections.find(
                                  (item) => item.id === this.collection.id
                              );

                    this.setData(collection);

                    this.modal.show = false;
                });
        },

        remove(action) {
            axios
                .delete(
                    `/admin/${this.action}/${this.form.id}`,
                    this.form.collection
                )
                .then((response) => {
                    this.collections = response.data.data;

                    this.setData(this.collections[0]);

                    this.modal.show = false;
                });
        },
    },

    mounted() {
        this.getAllCategories();
    },
};
</script>
