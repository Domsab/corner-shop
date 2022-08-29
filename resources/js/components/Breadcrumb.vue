<template>
    <!-- Breadcrumb -->
    <div class="border-b border-gray-200">
        <nav aria-label="Breadcrumb" class="mx-auto max-w-7xl">
            <ol role="list" class="flex items-center py-4 space-x-4">
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
                        {{ parentName }}
                    </a>
                </li>
            </ol>
        </nav>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        departmentName: String,
        parentName: String
    },
    setup(props) {


    },
};
</script>
