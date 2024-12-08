<script setup lang="ts">
import { onMounted, ref } from 'vue';

// Define the model type (string for textareas)
const model = defineModel<string>({ required: true });

const textarea = ref<HTMLTextAreaElement | null>(null);

// Focus the textarea when autofocus is set
onMounted(() => {
    if (textarea.value?.hasAttribute('autofocus')) {
        textarea.value?.focus();
    }
});

// Expose focus method to allow external focusing of the textarea
defineExpose({ focus: () => textarea.value?.focus() });
</script>

<template>
    <textarea
        class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600"
        v-model="model"
        ref="textarea"
        rows="4"
    />
</template>
