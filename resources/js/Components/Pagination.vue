<!-- /Components/Pagination.vue -->

<template>
    <nav aria-label="Page navigation">
        <ul class="flex justify-center">
            <li v-if="prevPageUrl">
                <a
                    :href="prevPageUrl"
                    class="px-3 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800"
                >
                    Prev
                </a>
            </li>
            <li v-for="page in pages" :key="page">
                <a
                    :href="page.url"
                    class="px-3 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800"
                    :class="{ 'bg-blue-500 text-white': page.active }"
                >
                    {{ page.label }}
                </a>
            </li>
            <li v-if="nextPageUrl">
                <a
                    :href="nextPageUrl"
                    class="px-3 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800"
                >
                    Next
                </a>
            </li>
        </ul>
    </nav>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';
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

const pages = computed(() => {
    return props.links.filter(
        (link) => link.active || link.rel === 'prev' || link.rel === 'next',
    );
});
</script>
