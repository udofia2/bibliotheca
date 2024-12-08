<template>
    <nav aria-label="Page navigation">
        <ul class="flex justify-center space-x-2">
            <!-- Previous Page -->
            <li v-if="prevPageUrl">
                <Link
                    :href="prevPageUrl"
                    class="rounded-md px-3 py-2 text-white hover:bg-red-600 dark:text-gray-200 dark:hover:bg-gray-800"
                >
                    Prev
                </Link>
            </li>
            <!-- Pagination Pages -->
            <li v-for="page in pages" :key="page.label">
                <Link
                    :href="page.url"
                    class="rounded-md px-3 py-2 text-white hover:bg-red-600 dark:text-gray-200 dark:hover:bg-gray-800"
                    :class="{
                        'bg-red-500 text-white': page.active,
                        'hover:bg-red-600': !page.active,
                    }"
                >
                    {{ page.label }}
                </Link>
            </li>
            <!-- Next Page -->
            <li v-if="nextPageUrl">
                <Link
                    :href="nextPageUrl"
                    class="rounded-md px-3 py-2 text-white hover:bg-red-600 dark:text-gray-200 dark:hover:bg-gray-800"
                >
                    Next
                </Link>
            </li>
        </ul>
    </nav>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';
const props = defineProps({
    links: Array,
});

const prevPageUrl = computed(() => {
    const prevPage = props.links.find((link) => link.rel === 'prev');
    return prevPage?.url;
});

const nextPageUrl = computed(() => {
    const nextPage = props.links.find((link) => link.rel === 'next');
    return nextPage?.url;
});

console.log(props)
const pages = computed(() => {
    return props.links.map((link) => {
        // Adjust the label for 'Previous' and 'Next' to remove the quotes
        if (link.label === '&laquo; Previous') {
            link.label = 'Prev';
        }
        if (link.label === 'Next &raquo;') {
            link.label = 'Next';
        }
        return link;
    }).filter((link) => link.label && link.url);
});

</script>
