<script setup lang="ts">
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Link } from '@inertiajs/vue3';

import { ref } from 'vue';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="flex min-h-screen flex-col bg-gray-100 dark:bg-gray-900">
            <!-- Navigation Bar -->
            <nav
                class="border-b border-gray-100 bg-white dark:border-gray-700 dark:bg-gray-800"
            >
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 justify-between">
                        <!-- Left: Logo and Links -->
                        <div class="flex">
                            <div
                                v-if="canLogin"
                                class="flex shrink-0 items-center"
                            >
                                <Link :href="route('dashboard')">
                                    <div class="flex items-center">
                                        <ApplicationLogo
                                            class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
                                        />
                                        <span class="ml-2 text-white"
                                            >figarts</span
                                        >
                                    </div>
                                </Link>
                            </div>
                            <div v-else class="flex shrink-0 items-center">
                                <Link :href="route('books.index')">
                                    <div class="flex items-center">
                                        <ApplicationLogo
                                            class="block h-6 w-9 fill-current text-gray-800 dark:text-gray-200"
                                        />
                                        <span class="text-3xl text-white"
                                            >figarts</span
                                        >
                                    </div>
                                </Link>
                            </div>
                        </div>

                        <!-- Right: User Dropdown (if logged in) -->
                        <div class="hidden sm:flex sm:items-center">
                            <div class="relative" v-if="$page.props.auth.user">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                class="inline-flex items-center rounded-md border bg-white px-3 py-2 text-sm font-medium text-gray-500 dark:bg-gray-800 dark:text-gray-400"
                                            >
                                                {{ $page.props.auth.user.name }}
                                                <svg
                                                    class="-me-0.5 ms-2 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>
                                    <template #content>
                                        <DropdownLink
                                            :href="route('profile.edit')"
                                        >
                                            Profile
                                        </DropdownLink>
                                        <DropdownLink
                                            :href="route('logout')"
                                            method="post"
                                            as="button"
                                        >
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Mobile Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="
                                    showingNavigationDropdown =
                                        !showingNavigationDropdown
                                "
                                class="inline-flex items-center justify-center rounded-md p-2 text-gray-400"
                            >
                                <svg
                                    class="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex':
                                                !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex':
                                                showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Mobile Menu -->
            <div
                :class="{
                    block: showingNavigationDropdown,
                    hidden: !showingNavigationDropdown,
                }"
                class="sm:hidden"
            ></div>

            <!-- Page Content -->
            <main class="container mx-auto flex-grow p-4">
                <slot></slot>
                <!-- Render the page content -->
            </main>
        </div>
    </div>
</template>

<style scoped>
/* Add custom styles if necessary */
</style>
