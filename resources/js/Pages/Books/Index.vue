<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Pagination from '@/Components/Pagination.vue';
import TextInput from '@/Components/TextInput.vue';
import BookLayout from '@/Layouts/BookLayout.vue';

import { Head, Link } from '@inertiajs/vue3';

import { computed, ref } from 'vue';

const props = defineProps({ books: Array });


const filters = ref({
    status: '',
    year: '',
});

const loading = ref(false);
const error = ref(false);

const filterBooks = computed(() => {
    return props.books.data.filter((book) => {
        return (
            (filters.value.status === '' ||
                book.status === filters.value.status) &&
            (filters.value.year === '' ||
                book.published_year === filters.value.year)
        );
    });
});


const clearFilters = () => {
    filters.value.status = '';
    filters.value.year = '';
};
</script>

<template>
    <BookLayout>
        <Head title="Books" />

        <h1 class="mb-4 text-3xl font-bold text-white">Book Collection</h1>

        <!-- Filters Section -->
        <div class="mb-4 flex items-center justify-between">
            <div class="flex space-x-4">
                <!-- Status Filter -->
                <div>
                    <InputLabel for="status" value="Status:" />
                    <select
                        id="status"
                        v-model="filters.status"
                        @change="filterBooks"
                        class="w-full rounded-lg border border-gray-300 bg-white p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#FF2D20]"
                    >
                        <option value="">All</option>
                        <option value="available">Available</option>
                        <option value="borrowed">Borrowed</option>
                        <option value="reserved">Reserved</option>
                    </select>
                    <InputError
                        class="mt-2"
                        :message="filters.errors?.status"
                    />
                </div>

                <!-- Year Filter -->
                <div>
                    <InputLabel for="year" value="Year:" />
                    <TextInput
                        id="year"
                        type="number"
                        v-model="filters.year"
                        @input="filterBooks"
                        class="w-full rounded-lg border border-gray-300 bg-white p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#FF2D20]"
                        placeholder="Enter year"
                    />
                    <InputError class="mt-2" :message="filters.errors?.year" />
                </div>
            </div>

            <!-- Add New Book Button -->
            <div>
                <Link
                    :href="route('books.create')"
                    class="inline-block rounded bg-[#FF2D20] px-4 py-2 text-white hover:bg-[#FF1A18]"
                    >Add New Book</Link
                >
            </div>
        </div>

        <!-- Clear Filters Button -->
        <div class="mb-4">
            <button
                @click="clearFilters"
                class="rounded bg-gray-500 px-4 py-2 text-white hover:bg-gray-600"
            >
                Clear Filters
            </button>
        </div>

        <!-- Loading Indicator -->
        <div v-if="loading" class="text-center text-gray-500">
            <p>Loading books...</p>
        </div>

        <!-- Books List -->
        <ul v-if="!loading" class="space-y-4">
            <li
                v-for="book in filterBooks"
                :key="book.id"
                class="rounded-lg border bg-zinc-800 p-4"
            >
                <h2 class="text-lg font-semibold text-white">
                    <span class="text-gray-400">Title:</span> {{ book.title }}
                </h2>
                <p class="text-white">
                    <span class="text-gray-400">Author:</span> {{ book.author }}
                </p>
                <p class="text-white">
                    <span class="text-gray-400">Description:</span>
                    {{ book.description }}
                </p>
                <p class="text-sm text-gray-500">
                    Year: {{ book.published_year }}
                </p>
                <p class="text-sm text-gray-500">Status: {{ book.status }}</p>

                <Link :href="`/books/${book.id}`">
                    <button
                        class="mt-1 rounded bg-[#FF2D20] px-4 py-2 text-white hover:bg-[#FF1A18]"
                    >
                        View Details
                    </button>
                </Link>
            </li>
        </ul>

        <!-- Pagination Section -->
        <div v-if="books.links.length" class="mt-4">
            <pagination :links="books.links" :total-items="books.total" />
        </div>

        <!-- Error Handling -->
        <div v-if="error" class="mt-4 text-center text-red-500">
            <p>Error loading books. Please try again later.</p>
        </div>
    </BookLayout>
</template>
