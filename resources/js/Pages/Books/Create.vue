<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextareaInput from '@/Components/TextareaInput.vue';
import BookLayout from '@/Layouts/BookLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    author: '',
    description: '',
    published_year: '',
    status: 'available',
});


const submit = () => {
    form.post(route('books.store'), {
        onFinish: () => {
            form.reset(); 
        },
    });
};
</script>
<template>
    <BookLayout>
        <Head title="Create Book" />

        <form @submit.prevent="submit" class="space-y-4">
            <!-- Book Title -->
            <div>
                <InputLabel for="title" value="Title" />
                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]"
                    v-model="form.title"
                    required
                    autofocus
                    autocomplete="title"
                />
                <InputError class="mt-2" :message="form.errors.title" />
            </div>

            <!-- Author -->
            <div>
                <InputLabel for="author" value="Author" />
                <TextInput
                    id="author"
                    type="text"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]"
                    v-model="form.author"
                    required
                    autocomplete="author"
                />
                <InputError class="mt-2" :message="form.errors.author" />
            </div>

            <!-- Description -->
            <div>
                <InputLabel for="description" value="Description" />
                <TextareaInput
                    id="description"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]"
                    v-model="form.description"
                    required
                    rows="4"
                    placeholder="Enter a brief description of the book"
                />
                <InputError class="mt-2" :message="form.errors.description" />
            </div>

            <!-- Published Year -->
            <div>
                <InputLabel for="published_year" value="Published Year" />
                <TextInput
                    id="published_year"
                    type="number"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]"
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
            <div>
                <InputLabel for="status" value="Status" />
                <select
                    id="status"
                    v-model="form.status"
                    class="form-select mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]"
                    required
                >
                    <option value="available">Available</option>
                    <option value="borrowed">Borrowed</option>
                    <option value="reserved">Reserved</option>
                </select>
                <InputError class="mt-2" :message="form.errors.status" />
            </div>

            
            <div class="flex items-center justify-end">
                <PrimaryButton
                    class="ms-4 px-4 py-2 bg-[#FF2D20] text-white rounded-md hover:bg-[#FF1A18] focus:outline-none focus:ring-2 focus:ring-[#FF2D20] focus:ring-offset-2 disabled:opacity-50"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Create Book
                </PrimaryButton>
            </div>
        </form>
    </BookLayout>
</template>
