<template>
    <div v-if="pagination.links.length > 3"
        class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="flex flex-1 justify-between sm:hidden">
            <a href="#"
                class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
            <a href="#"
                class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
        </div>
        <div class="hidden sm:flex sm:flex-col sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Mostrando
                    <span class="font-medium">{{ pagination.from }}</span>
                    a
                    <span class="font-medium">{{ pagination.to }}</span>
                    de
                    <span class="font-medium">{{ pagination.total }}</span>
                    resultados
                </p>
            </div>
            <div>
                <div class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">

                    <div v-for="(link, key) in pagination.links" :key="key">
                        <div class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0"
                            v-html="link.label" v-if="link.url == null">
                        </div>
                        <Link v-else :href="link.url" :key="'link-' + key"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0"
                            :class="link.active ? ' bg-indigo-50 border-indigo-500' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'"
                            v-html="link.label">
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    props: {
        pagination: {
            type: Object,
            required: true,
        },
    },   
}
</script>

<style></style>