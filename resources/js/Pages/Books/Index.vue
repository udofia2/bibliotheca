<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Pagination from '@/Components/Pagination.vue';
import TextInput from '@/Components/TextInput.vue';
import BookLayout from '@/Layouts/BookLayout.vue';
import { ref } from 'vue';

const props = defineProps({ books: Array });

// Filters for book listing
const filters = ref({
    status: '',
    year: '',
});

const loading = ref(false);
const error = ref(false);
console.log(props.books);

// Clear the filters and refresh the books list
const clearFilters = () => {
    filters.value.status = '';
    filters.value.year = '';
};
</script>

<template>
    <BookLayout>
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
                        class="input"
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
                        class="input"
                        placeholder="Enter year"
                    />
                    <InputError class="mt-2" :message="filters.errors?.year" />
                </div>
            </div>

            <!-- Add New Book Button -->
            <div>
                <a
                    href="books/create"
                    class="rounded bg-blue-500 p-2 text-white"
                    >Add New Book</a
                >
            </div>
        </div>

        <!-- Clear Filters Button -->
        <div class="mb-4">
            <button
                @click="clearFilters"
                class="rounded bg-gray-500 p-2 text-white"
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
            <li v-for="book in books.data" :key="book.id" class="border p-4">
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
                <button
                    class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600 mt-1"
                >
                    <a :href="`/books/${book.id}`">View Details</a>
                </button>
                >
            </li>
        </ul>

        <!-- Pagination Section -->
        <div v-if="books.links.length" class="mt-4">
            <pagination :links="books.links" />
        </div>

        <!-- Error Handling -->
        <div v-if="error" class="mt-4 text-center text-red-500">
            <p>Error loading books. Please try again later.</p>
        </div>
    </BookLayout>
</template>

<style scoped>
.input {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 0.375rem;
    background-color: white;
    color: #333;
    font-size: 1rem;
}

.input:focus {
    border-color: #4f46e5;
    outline: none;
}

button {
    transition: background-color 0.2s;
}

button:hover {
    background-color: #6b7280;
}
</style>
