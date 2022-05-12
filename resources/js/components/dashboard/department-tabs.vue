<template>
    <!-- Department tabs -->
    <div
        class="px-4 mt-8 first-line:mt-8 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8"
    >
        <div class="hidden lg:block">
            <div class="border-b border-gray-200">
                <nav class="flex -mb-px space-x-8">
                    <a
                        v-for="department in departments"
                        :key="department.name"
                        :href="department.href"
                        @click="setData(department)"
                        :class="[
                            tabs.active === department.name
                                ? 'border-purple-500 text-purple-600'
                                : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700',
                            'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm',
                        ]"
                        >{{ department.name }}</a
                    >
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    setup(props) {
        function setData(department) {
            console.log("setData", department);

            this.tabs.active = department.name;

            this.department.id = department.id;

            this.department.name = department.name;

            this.department.description = department.description;

            this.categories = department.categories;
        };

        function  getData() {
            axios.get("/dashboard/departments").then((response) => {
                this.departments = response.data.data;
                console.log("getData", this.departments);

                this.setData(this.departments[0]);
            });
        };
    },
}
</script>
