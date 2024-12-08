<script setup lang="ts">
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import TextareaInput from '@/Components/TextareaInput.vue';
import BookLayout from '@/Layouts/BookLayout.vue';
import { usePage } from '@inertiajs/vue3';

import { Head, Link } from '@inertiajs/vue3';


const { book } = usePage().props;
</script>
<template>
    <BookLayout>
        <Head title="Show Book" />

        <h1 class="mb-4 text-2xl font-bold text-white">Book Details</h1>

        <!-- Book Details -->
        <div class="space-y-4">
            <!-- Title -->
            <div>
                <InputLabel for="title" value="Title" class="text-white" />
                <TextInput
                    id="title"
                    type="text"
                    v-model="book.title"
                    class="mt-1 block w-full bg-gray-800 text-white border-gray-700 focus:ring-2 focus:ring-red-500 focus:border-red-500 disabled:bg-gray-700 disabled:text-gray-500 disabled:border-gray-600"
                    disabled
                />
            </div>

            <!-- Author -->
            <div>
                <InputLabel for="author" value="Author" class="text-white" />
                <TextInput
                    id="author"
                    type="text"
                    v-model="book.author"
                    class="mt-1 block w-full bg-gray-800 text-white border-gray-700 focus:ring-2 focus:ring-red-500 focus:border-red-500 disabled:bg-gray-700 disabled:text-gray-500 disabled:border-gray-600"
                    disabled
                />
            </div>

            <!-- Description -->
            <div>
                <InputLabel for="description" value="Description" class="text-white" />
                <TextareaInput
                    id="description"
                    class="mt-1 block w-full bg-gray-800 text-white border-gray-700 focus:ring-2 focus:ring-red-500 focus:border-red-500 disabled:bg-gray-700 disabled:text-gray-500 disabled:border-gray-600"
                    v-model="book.description"
                    disabled
                    rows="4"
                    placeholder="Enter a brief description of the book"
                />
            </div>

            <!-- Published Year -->
            <div>
                <InputLabel for="published_year" value="Published Year" class="text-white" />
                <TextInput
                    id="published_year"
                    type="number"
                    v-model="book.published_year"
                    class="mt-1 block w-full bg-gray-800 text-white border-gray-700 focus:ring-2 focus:ring-red-500 focus:border-red-500 disabled:bg-gray-700 disabled:text-gray-500 disabled:border-gray-600"
                    disabled
                />
            </div>

            <!-- Status -->
            <div>
                <InputLabel for="status" value="Status" class="text-white" />
                <TextInput
                    id="status"
                    type="text"
                    v-model="book.status"
                    class="mt-1 block w-full bg-gray-800 text-white border-gray-700 focus:ring-2 focus:ring-red-500 focus:border-red-500 disabled:bg-gray-700 disabled:text-gray-500 disabled:border-gray-600"
                    disabled
                />
            </div>
        </div>

        <!-- Edit Button -->
        <div class="mt-4 flex items-center justify-end">
            <Link
                :href="`/books/${book.id}/edit`"
                class="rounded bg-red-600 px-4 py-2 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
            >
                Edit Book
        </Link>
        </div>
    </BookLayout>
</template>

