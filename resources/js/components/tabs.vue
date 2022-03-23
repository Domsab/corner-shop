<template>
    <div class="px-4 mt-8 first-line:mt-8 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
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
</template>
