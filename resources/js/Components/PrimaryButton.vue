<template>
    <button
        class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-red-600 focus:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 active:bg-gray-900 dark:bg-red-700 dark:text-gray-300 dark:hover:bg-red-500 dark:focus:bg-red-700 dark:focus:ring-offset-gray-900 dark:active:bg-red-800"
    >
        <slot />
    </button>
</template>

<script setup lang="ts">
withDefaults(
    defineProps<{
        type?: 'button' | 'submit' | 'reset';
    }>(),
    {
        type: 'button',
    },
);
</script>