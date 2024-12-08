<script setup lang="ts">
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import TextareaInput from '@/Components/TextareaInput.vue';
import BookLayout from '@/Layouts/BookLayout.vue';
import { usePage } from '@inertiajs/vue3';

// Get the book data from the page props
const { book } = usePage().props;
</script>

<template>
    <BookLayout>
        <h1 class="mb-4 text-2xl font-bold">Book Details</h1>

        <!-- Book Details -->
        <div class="space-y-4">
            <!-- Title -->
            <div>
                <InputLabel for="title" value="Title" />
                <TextInput
                    id="title"
                    type="text"
                    v-model="book.title"
                    class="mt-1 block w-full"
                    disabled
                />
            </div>

            <!-- Author -->
            <div>
                <InputLabel for="author" value="Author" />
                <TextInput
                    id="author"
                    type="text"
                    v-model="book.author"
                    class="mt-1 block w-full"
                    disabled
                />
            </div>

            <!-- Description -->
            <div>
                <InputLabel for="description" value="Description" />
                <TextareaInput
                    id="description"
                    class="mt-1 block w-full"
                    v-model="book.description"
                    disabled
                    rows="4"
                    placeholder="Enter a brief description of the book"
                />
            </div>

            <!-- Published Year -->
            <div>
                <InputLabel for="published_year" value="Published Year" />
                <TextInput
                    id="published_year"
                    type="number"
                    v-model="book.published_year"
                    class="mt-1 block w-full"
                    disabled
                />
            </div>

            <!-- Status -->
            <div>
                <InputLabel for="status" value="Status" />
                <TextInput
                    id="status"
                    type="text"
                    v-model="book.status"
                    class="mt-1 block w-full"
                    disabled
                />
            </div>
        </div>

        <!-- Edit Button -->
        <div class="mt-4 flex items-center justify-end">
            <a
                :href="`/books/${book.id}/edit`"
                class="rounded bg-blue-500 p-2 text-white"
            >
                Edit Book
            </a>
        </div>
    </BookLayout>
</template>

<style scoped>
.input,
.textarea {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 0.375rem;
    background-color: white;
    color: #333;
    font-size: 1rem;
}

.input:focus,
.textarea:focus {
    border-color: #4f46e5;
    outline: none;
}
</style>
