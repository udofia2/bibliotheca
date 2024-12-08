<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextareaInput from '@/Components/TextareaInput.vue';
import BookLayout from '@/Layouts/BookLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

// Define the form state using Inertia's useForm hook
const form = useForm({
    title: '',
    author: '',
    description: '',
    published_year: '',
    status: 'available', // Default value for status
});

// Submit function for creating a book
const submit = () => {
    form.post(route('books.store'), {
        onFinish: () => {
            form.reset(); // Reset the form after submission
        },
    });
};
</script>

<template>
    <BookLayout>
        <Head title="Create Book" />

        <form @submit.prevent="submit">
            <!-- Book Title -->
            <div>
                <InputLabel for="title" value="Title" />
                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    required
                    autofocus
                    autocomplete="title"
                />
                <InputError class="mt-2" :message="form.errors.title" />
            </div>

            <!-- Author -->
            <div class="mt-4">
                <InputLabel for="author" value="Author" />
                <TextInput
                    id="author"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.author"
                    required
                    autocomplete="author"
                />
                <InputError class="mt-2" :message="form.errors.author" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <InputLabel for="description" value="Description" />
                <TextareaInput
                    id="description"
                    class="mt-1 block w-full"
                    v-model="form.description"
                    required
                    rows="4"
                    placeholder="Enter a brief description of the book"
                />
                <InputError class="mt-2" :message="form.errors.description" />
            </div>

            <!-- Published Year -->
            <div class="mt-4">
                <InputLabel for="published_year" value="Published Year" />
                <TextInput
                    id="published_year"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.published_year"
                    required
                    autocomplete="published_year"
                />
                <InputError
                    class="mt-2"
                    :message="form.errors.published_year"
                />
            </div>

            <!-- Status (Dropdown) -->
            <div class="mt-4">
                <InputLabel for="status" value="Status" />
                <select
                    id="status"
                    v-model="form.status"
                    class="form-select mt-1 block w-full"
                    required
                >
                    <option value="available">Available</option>
                    <option value="borrowed">Borrowed</option>
                    <option value="reserved">Reserved</option>
                </select>
                <InputError class="mt-2" :message="form.errors.status" />
            </div>

            <!-- Submit Button -->
            <div class="mt-4 flex items-center justify-end">
                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Create Book
                </PrimaryButton>
            </div>
        </form>
    </BookLayout>
</template>
