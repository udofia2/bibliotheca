<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img
            id="background"
            class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg"
        />
        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header
                    class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3"
                >
                    <div class="flex lg:col-start-2 lg:justify-center">
                        <div class="w-28">
                            <svg
                                viewBox="0 0 32 32"
                                aria-hidden="true"
                                preserveAspectRatio="xMinYMid meet"
                            >
                                <rect
                                    clip-path="url(#:r2:-clip)"
                                    class="h-8 w-0 fill-neutral-950 transition-all duration-300 group-hover/logo:w-8"
                                ></rect>
                                <use
                                    href="#:r2:-path"
                                    class="stroke-gray-400"
                                    fill="none"
                                    stroke-width="1.5"
                                ></use>
                                <defs>
                                    <path
                                        id=":r2:-path"
                                        d="M10.685,22.121,4.758,15.852c-2.446-2.584-.347-6.494,3.48-6.494H18.855a.374.374,0,0,1,.267.11l5.848,6.183a.121.121,0,0,1-.106.2H14.821l5.845,6.184a.121.121,0,0,1-.107.2h-9.61A.371.371,0,0,1,10.685,22.121ZM5.88,6.383.032.2A.12.12,0,0,1,.139,0H19.854a.369.369,0,0,1,.269.11l5.845,6.185a.121.121,0,0,1-.106.2H6.143A.367.367,0,0,1,5.88,6.383Z"
                                    ></path>
                                    <clipPath id=":r2:-clip">
                                        <use href="#:r2:-path"></use>
                                    </clipPath>
                                </defs></svg
                            ><path
                                class="fill-neutral-950"
                                d="M3.37-33.354V-46.414H.805v-3.031H3.37v-2.033a3.649,3.649,0,0,1,1.161-2.928,4.849,4.849,0,0,1,3.26-1h2.8v2.668H8.815a1.7,1.7,0,0,0-1.325.414A1.661,1.661,0,0,0,7.133-51.2v1.754h3.194v3.031H7.133v13.061Zm9.064,0v-16.1h3.781v16.1Zm0-18.373V-55.4h3.781v3.677ZM26.547-28a9.486,9.486,0,0,1-3.5-.588A5.577,5.577,0,0,1,20.7-30.247a4.639,4.639,0,0,1-1.006-2.515h3.647a2.083,2.083,0,0,0,.549,1.071,2.858,2.858,0,0,0,1.132.713,4.759,4.759,0,0,0,1.616.251,5.641,5.641,0,0,0,2.256-.389,2.691,2.691,0,0,0,1.329-1.21,4.452,4.452,0,0,0,.443-2.122v-2.947h-.224a4.481,4.481,0,0,1-1.877,2.236,5.861,5.861,0,0,1-3.191.854,6.61,6.61,0,0,1-2.625-.5,5.5,5.5,0,0,1-2.024-1.484,6.757,6.757,0,0,1-1.3-2.424,11.039,11.039,0,0,1-.454-3.31,9.912,9.912,0,0,1,.808-4.23,5.893,5.893,0,0,1,2.256-2.606,6.344,6.344,0,0,1,3.379-.886,5.838,5.838,0,0,1,3.165.841,4.434,4.434,0,0,1,1.864,2.223h.224l.1-2.774h3.664v14.4a8.615,8.615,0,0,1-.562,3.3,5.322,5.322,0,0,1-1.61,2.184,6.637,6.637,0,0,1-2.5,1.2A12.863,12.863,0,0,1,26.547-28Zm.173-9.221a3.818,3.818,0,0,0,2.13-.564,3.765,3.765,0,0,0,1.32-1.452,4.33,4.33,0,0,0,.49-1.838l-.017-1.936a4.332,4.332,0,0,0-.478-1.824,3.672,3.672,0,0,0-1.292-1.428,3.811,3.811,0,0,0-2.128-.555,3.882,3.882,0,0,0-2.072.542,3.524,3.524,0,0,0-1.365,1.612,6.413,6.413,0,0,0-.482,2.638,6.413,6.413,0,0,0,.488,2.664,3.534,3.534,0,0,0,1.365,1.605A3.835,3.835,0,0,0,26.72-37.221Zm16.627,4.144a6.4,6.4,0,0,1-2.645-.534A5.63,5.63,0,0,1,38.642-35.2a7.289,7.289,0,0,1-1.329-2.61,12.763,12.763,0,0,1-.46-3.606,11.448,11.448,0,0,1,.814-4.594,6.144,6.144,0,0,1,2.279-2.8,6.149,6.149,0,0,1,3.4-.942,6.547,6.547,0,0,1,2.366.406,5.286,5.286,0,0,1,1.81,1.139,4.7,4.7,0,0,1,1.13,1.722h.212l.147-2.977h3.634v16.1H48.866v-3h-.212A4.882,4.882,0,0,1,46.7-33.978,6.016,6.016,0,0,1,43.347-33.077Zm1.4-3.085A3.809,3.809,0,0,0,47.01-36.8a4.012,4.012,0,0,0,1.352-1.644,5.116,5.116,0,0,0,.456-2.135v-1.681a5.143,5.143,0,0,0-.456-2.15,3.97,3.97,0,0,0-1.352-1.636,3.837,3.837,0,0,0-2.262-.631,3.84,3.84,0,0,0-2.118.581,3.782,3.782,0,0,0-1.411,1.739,7.423,7.423,0,0,0-.5,2.943,7.407,7.407,0,0,0,.5,2.914,3.772,3.772,0,0,0,1.411,1.754A3.841,3.841,0,0,0,44.748-36.162Zm11.666,2.809v-16.1h3.405l.173,2.713h.147A3.88,3.88,0,0,1,61.9-48.981a5.609,5.609,0,0,1,2.787-.689q.272,0,.5.006t.436.019v3.561q-.177-.013-.436-.019t-.553-.007a5.569,5.569,0,0,0-2.424.467,3.253,3.253,0,0,0-1.465,1.348,4.819,4.819,0,0,0-.562,2.143v8.8Zm17.051,0a5.1,5.1,0,0,1-2.318-.432,2.38,2.38,0,0,1-1.16-1.255,5.292,5.292,0,0,1-.328-1.964V-46.4H66.7v-3.059h2.96v-4.529l3.768-.393v4.922h3.409V-46.4H73.426v8.694a1.253,1.253,0,0,0,.32,1.016,1.65,1.65,0,0,0,1.015.25h2.074v3.085Zm11.844.3a9.2,9.2,0,0,1-3.694-.676,5.44,5.44,0,0,1-2.383-1.886,4.858,4.858,0,0,1-.832-2.821h3.729a2.355,2.355,0,0,0,.927,2.033,3.991,3.991,0,0,0,2.353.642,3.732,3.732,0,0,0,2.186-.534,1.725,1.725,0,0,0,.743-1.484,1.737,1.737,0,0,0-.346-1.158,2.3,2.3,0,0,0-1.091-.639,12.834,12.834,0,0,0-1.981-.406,16.352,16.352,0,0,1-3.409-.83,4.264,4.264,0,0,1-2.024-1.469,4.205,4.205,0,0,1-.668-2.476,4.3,4.3,0,0,1,.825-2.625,5.431,5.431,0,0,1,2.307-1.748,8.775,8.775,0,0,1,3.457-.631,8.357,8.357,0,0,1,3.39.633,5.228,5.228,0,0,1,2.234,1.767,4.734,4.734,0,0,1,.832,2.682H88.148a2.464,2.464,0,0,0-.363-1.359,2.041,2.041,0,0,0-.977-.767,4.072,4.072,0,0,0-1.491-.246,3.349,3.349,0,0,0-1.994.523A1.667,1.667,0,0,0,82.6-45.1a1.526,1.526,0,0,0,.384,1.091,2.635,2.635,0,0,0,1.227.644,17.536,17.536,0,0,0,2.169.426,16.187,16.187,0,0,1,2.53.532,5.685,5.685,0,0,1,1.813.894,3.517,3.517,0,0,1,1.1,1.394,4.99,4.99,0,0,1,.365,2.011A4.293,4.293,0,0,1,90.3-34.367,8.556,8.556,0,0,1,85.309-33.051Z"
                                transform="translate(35 55.404)"
                            ></path>
                        </div>
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('books.index')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Books
                        </Link>

                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('books.index')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Books
                            </Link>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                        <a
                            href="https://github.com/udofia2/bibliotheca"
                            id="docs-card"
                            class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                        >
                            <div
                                id="screenshot-container"
                                class="relative flex w-full flex-1 items-stretch"
                            >
                                <div class="w-28">
                                    <svg
                                        viewBox="0 0 32 32"
                                        aria-hidden="true"
                                        preserveAspectRatio="xMinYMid meet"
                                    >
                                        <rect
                                            clip-path="url(#:r2:-clip)"
                                            class="h-8 w-0 fill-neutral-950 transition-all duration-300 group-hover/logo:w-8"
                                        ></rect>
                                        <use
                                            href="#:r2:-path"
                                            class="stroke-gray-500"
                                            fill="none"
                                            stroke-width="1.5"
                                        ></use>
                                        <defs>
                                            <path
                                                id=":r2:-path"
                                                d="M10.685,22.121,4.758,15.852c-2.446-2.584-.347-6.494,3.48-6.494H18.855a.374.374,0,0,1,.267.11l5.848,6.183a.121.121,0,0,1-.106.2H14.821l5.845,6.184a.121.121,0,0,1-.107.2h-9.61A.371.371,0,0,1,10.685,22.121ZM5.88,6.383.032.2A.12.12,0,0,1,.139,0H19.854a.369.369,0,0,1,.269.11l5.845,6.185a.121.121,0,0,1-.106.2H6.143A.367.367,0,0,1,5.88,6.383Z"
                                            ></path>
                                            <clipPath id=":r2:-clip">
                                                <use href="#:r2:-path"></use>
                                            </clipPath>
                                        </defs></svg
                                    ><path
                                        class="fill-neutral-950"
                                        d="M3.37-33.354V-46.414H.805v-3.031H3.37v-2.033a3.649,3.649,0,0,1,1.161-2.928,4.849,4.849,0,0,1,3.26-1h2.8v2.668H8.815a1.7,1.7,0,0,0-1.325.414A1.661,1.661,0,0,0,7.133-51.2v1.754h3.194v3.031H7.133v13.061Zm9.064,0v-16.1h3.781v16.1Zm0-18.373V-55.4h3.781v3.677ZM26.547-28a9.486,9.486,0,0,1-3.5-.588A5.577,5.577,0,0,1,20.7-30.247a4.639,4.639,0,0,1-1.006-2.515h3.647a2.083,2.083,0,0,0,.549,1.071,2.858,2.858,0,0,0,1.132.713,4.759,4.759,0,0,0,1.616.251,5.641,5.641,0,0,0,2.256-.389,2.691,2.691,0,0,0,1.329-1.21,4.452,4.452,0,0,0,.443-2.122v-2.947h-.224a4.481,4.481,0,0,1-1.877,2.236,5.861,5.861,0,0,1-3.191.854,6.61,6.61,0,0,1-2.625-.5,5.5,5.5,0,0,1-2.024-1.484,6.757,6.757,0,0,1-1.3-2.424,11.039,11.039,0,0,1-.454-3.31,9.912,9.912,0,0,1,.808-4.23,5.893,5.893,0,0,1,2.256-2.606,6.344,6.344,0,0,1,3.379-.886,5.838,5.838,0,0,1,3.165.841,4.434,4.434,0,0,1,1.864,2.223h.224l.1-2.774h3.664v14.4a8.615,8.615,0,0,1-.562,3.3,5.322,5.322,0,0,1-1.61,2.184,6.637,6.637,0,0,1-2.5,1.2A12.863,12.863,0,0,1,26.547-28Zm.173-9.221a3.818,3.818,0,0,0,2.13-.564,3.765,3.765,0,0,0,1.32-1.452,4.33,4.33,0,0,0,.49-1.838l-.017-1.936a4.332,4.332,0,0,0-.478-1.824,3.672,3.672,0,0,0-1.292-1.428,3.811,3.811,0,0,0-2.128-.555,3.882,3.882,0,0,0-2.072.542,3.524,3.524,0,0,0-1.365,1.612,6.413,6.413,0,0,0-.482,2.638,6.413,6.413,0,0,0,.488,2.664,3.534,3.534,0,0,0,1.365,1.605A3.835,3.835,0,0,0,26.72-37.221Zm16.627,4.144a6.4,6.4,0,0,1-2.645-.534A5.63,5.63,0,0,1,38.642-35.2a7.289,7.289,0,0,1-1.329-2.61,12.763,12.763,0,0,1-.46-3.606,11.448,11.448,0,0,1,.814-4.594,6.144,6.144,0,0,1,2.279-2.8,6.149,6.149,0,0,1,3.4-.942,6.547,6.547,0,0,1,2.366.406,5.286,5.286,0,0,1,1.81,1.139,4.7,4.7,0,0,1,1.13,1.722h.212l.147-2.977h3.634v16.1H48.866v-3h-.212A4.882,4.882,0,0,1,46.7-33.978,6.016,6.016,0,0,1,43.347-33.077Zm1.4-3.085A3.809,3.809,0,0,0,47.01-36.8a4.012,4.012,0,0,0,1.352-1.644,5.116,5.116,0,0,0,.456-2.135v-1.681a5.143,5.143,0,0,0-.456-2.15,3.97,3.97,0,0,0-1.352-1.636,3.837,3.837,0,0,0-2.262-.631,3.84,3.84,0,0,0-2.118.581,3.782,3.782,0,0,0-1.411,1.739,7.423,7.423,0,0,0-.5,2.943,7.407,7.407,0,0,0,.5,2.914,3.772,3.772,0,0,0,1.411,1.754A3.841,3.841,0,0,0,44.748-36.162Zm11.666,2.809v-16.1h3.405l.173,2.713h.147A3.88,3.88,0,0,1,61.9-48.981a5.609,5.609,0,0,1,2.787-.689q.272,0,.5.006t.436.019v3.561q-.177-.013-.436-.019t-.553-.007a5.569,5.569,0,0,0-2.424.467,3.253,3.253,0,0,0-1.465,1.348,4.819,4.819,0,0,0-.562,2.143v8.8Zm17.051,0a5.1,5.1,0,0,1-2.318-.432,2.38,2.38,0,0,1-1.16-1.255,5.292,5.292,0,0,1-.328-1.964V-46.4H66.7v-3.059h2.96v-4.529l3.768-.393v4.922h3.409V-46.4H73.426v8.694a1.253,1.253,0,0,0,.32,1.016,1.65,1.65,0,0,0,1.015.25h2.074v3.085Zm11.844.3a9.2,9.2,0,0,1-3.694-.676,5.44,5.44,0,0,1-2.383-1.886,4.858,4.858,0,0,1-.832-2.821h3.729a2.355,2.355,0,0,0,.927,2.033,3.991,3.991,0,0,0,2.353.642,3.732,3.732,0,0,0,2.186-.534,1.725,1.725,0,0,0,.743-1.484,1.737,1.737,0,0,0-.346-1.158,2.3,2.3,0,0,0-1.091-.639,12.834,12.834,0,0,0-1.981-.406,16.352,16.352,0,0,1-3.409-.83,4.264,4.264,0,0,1-2.024-1.469,4.205,4.205,0,0,1-.668-2.476,4.3,4.3,0,0,1,.825-2.625,5.431,5.431,0,0,1,2.307-1.748,8.775,8.775,0,0,1,3.457-.631,8.357,8.357,0,0,1,3.39.633,5.228,5.228,0,0,1,2.234,1.767,4.734,4.734,0,0,1,.832,2.682H88.148a2.464,2.464,0,0,0-.363-1.359,2.041,2.041,0,0,0-.977-.767,4.072,4.072,0,0,0-1.491-.246,3.349,3.349,0,0,0-1.994.523A1.667,1.667,0,0,0,82.6-45.1a1.526,1.526,0,0,0,.384,1.091,2.635,2.635,0,0,0,1.227.644,17.536,17.536,0,0,0,2.169.426,16.187,16.187,0,0,1,2.53.532,5.685,5.685,0,0,1,1.813.894,3.517,3.517,0,0,1,1.1,1.394,4.99,4.99,0,0,1,.365,2.011A4.293,4.293,0,0,1,90.3-34.367,8.556,8.556,0,0,1,85.309-33.051Z"
                                        transform="translate(35 55.404)"
                                    ></path>
                                </div>
                                <img
                                    src="https://laravel.com/assets/img/welcome/docs-light.svg"
                                    alt="Laravel documentation screenshot"
                                    class="aspect-video h-full w-full flex-1 rounded-[10px] object-cover object-top drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden"
                                    @error="handleImageError"
                                />
                                <img
                                    src="https://laravel.com/assets/img/welcome/docs-dark.svg"
                                    alt="Laravel documentation screenshot"
                                    class="hidden aspect-video h-full w-full flex-1 rounded-[10px] object-cover object-top drop-shadow-[0px_4px_34px_rgba(0,0,0,0.25)] dark:block"
                                />
                                <div
                                    class="absolute -bottom-16 -left-16 h-40 w-[calc(100%+8rem)] bg-gradient-to-b from-transparent via-white to-white dark:via-zinc-900 dark:to-zinc-900"
                                ></div>
                            </div>

                            <div
                                class="relative flex items-center gap-6 lg:items-end"
                            >
                                <div
                                    id="docs-card-content"
                                    class="flex items-start gap-6 lg:flex-col"
                                >
                                    <div
                                        class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16"
                                    >
                                        <svg
                                            class="size-5 sm:size-6"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                fill="#FF2D20"
                                                d="M23 4a1 1 0 0 0-1.447-.894L12.224 7.77a.5.5 0 0 1-.448 0L2.447 3.106A1 1 0 0 0 1 4v13.382a1.99 1.99 0 0 0 1.105 1.79l9.448 4.728c.14.065.293.1.447.1.154-.005.306-.04.447-.105l9.453-4.724a1.99 1.99 0 0 0 1.1-1.789V4ZM3 6.023a.25.25 0 0 1 .362-.223l7.5 3.75a.251.251 0 0 1 .138.223v11.2a.25.25 0 0 1-.362.224l-7.5-3.75a.25.25 0 0 1-.138-.22V6.023Zm18 11.2a.25.25 0 0 1-.138.224l-7.5 3.75a.249.249 0 0 1-.329-.099.249.249 0 0 1-.033-.12V9.772a.251.251 0 0 1 .138-.224l7.5-3.75a.25.25 0 0 1 .362.224v11.2Z"
                                            />
                                            <path
                                                fill="#FF2D20"
                                                d="m3.55 1.893 8 4.048a1.008 1.008 0 0 0 .9 0l8-4.048a1 1 0 0 0-.9-1.785l-7.322 3.706a.506.506 0 0 1-.452 0L4.454.108a1 1 0 0 0-.9 1.785H3.55Z"
                                            />
                                        </svg>
                                    </div>

                                    <div class="pt-3 sm:pt-5 lg:pt-0">
                                        <h2
                                            class="text-xl font-semibold text-black dark:text-white"
                                        >
                                            Visit the README
                                        </h2>

                                        <p class="mt-4 text-sm/relaxed">
                                            Our book collection has a
                                            comprehensive guide covering every
                                            aspect of the library. Whether you
                                            are a new user or have prior
                                            experience with our catalog, we
                                            recommend reading our README from
                                            beginning to end.
                                        </p>
                                    </div>
                                </div>

                                <svg
                                    class="size-6 shrink-0 stroke-[#FF2D20]"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"
                                    />
                                </svg>
                            </div>
                        </a>

                        <a
                            href="/books"
                            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                        >
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="32"
                                    height="32"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        fill="#FF2D20"
                                        d="M12 11.55C9.64 9.35 6.48 8 3 8v11c3.48 0 6.64 1.35 9 3.55c2.36-2.19 5.52-3.55 9-3.55V8c-3.48 0-6.64 1.35-9 3.55M12 8c1.66 0 3-1.34 3-3s-1.34-3-3-3s-3 1.34-3 3s1.34 3 3 3"
                                    />
                                </svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2
                                    class="text-xl font-semibold text-black dark:text-white"
                                >
                                    See all Books
                                </h2>

                                <p class="mt-4 text-sm/relaxed">
                                    Our book collection offers thousands of
                                    titles on various subjects, including
                                    fiction, non-fiction, and educational
                                    resources. Explore our shelves, discover new
                                    authors, and massively expand your reading
                                    list in the process.
                                </p>
                            </div>

                            <svg
                                class="size-6 shrink-0 self-center stroke-[#FF2D20]"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"
                                />
                            </svg>
                        </a>

                        <a
                            href="/books/create"
                            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                        >
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="32"
                                    height="32"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        fill="#FF2D20"
                                        d="M16 20.975v-3h-3v-2h3v-3h2v3h3v2h-3v3zM3 18v-2h2v2zm4 0v-2h4.075q-.075.525-.062 1t.087 1zm-4-4v-2h2v2zm4 0v-2h6.65q-.575.4-1.037.9T11.8 14zm-4-4V8h2v2zm4 0V8h12v2zM3 6V4h2v2zm4 0V4h12v2z"
                                    />
                                </svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2
                                    class="text-xl font-semibold text-black dark:text-white"
                                >
                                    Create a new Book
                                </h2>

                                <p class="mt-4 text-sm/relaxed">
                                    Our library invites you to contribute to our
                                    collection by adding a new book title,
                                    including fiction, non-fiction, and
                                    educational resources. Share your favorite
                                    authors, new releases, and literary
                                    discoveries with our community.
                                </p>
                            </div>

                            <svg
                                class="size-6 shrink-0 self-center stroke-[#FF2D20]"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"
                                />
                            </svg>
                        </a>

                        <a
                            href="/books/create"
                            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                        >
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="32"
                                    height="32"
                                    viewBox="0 0 15 15"
                                >
                                    <path
                                        fill="#FF2D20"
                                        d="m1.61 12.738l-.104.489zm11.78 0l.104.489zm0-10.476l.104-.489zm-11.78 0l.106.489zM6.5 5.5l.277-.416A.5.5 0 0 0 6 5.5zm0 4H6a.5.5 0 0 0 .777.416zm3-2l.277.416a.5.5 0 0 0 0-.832zM0 3.636v7.728h1V3.636zm15 7.728V3.636h-1v7.728zM1.506 13.227c3.951.847 8.037.847 11.988 0l-.21-.978a27.6 27.6 0 0 1-11.568 0zM13.494 1.773a28.6 28.6 0 0 0-11.988 0l.21.978a27.6 27.6 0 0 1 11.568 0zM15 3.636c0-.898-.628-1.675-1.506-1.863l-.21.978c.418.09.716.458.716.885zm-1 7.728a.905.905 0 0 1-.716.885l.21.978A1.905 1.905 0 0 0 15 11.364zm-14 0c0 .898.628 1.675 1.506 1.863l.21-.978A.905.905 0 0 1 1 11.364zm1-7.728c0-.427.298-.796.716-.885l-.21-.978A1.905 1.905 0 0 0 0 3.636zM6 5.5v4h1v-4zm.777 4.416l3-2l-.554-.832l-3 2zm3-2.832l-3-2l-.554.832l3 2z"
                                    />
                                </svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2
                                    class="text-xl font-semibold text-black dark:text-white"
                                >
                                    Watch the Demo
                                </h2>

                                <p class="mt-4 text-sm/relaxed">
                                    Our book management system is designed to
                                    simplify your library experience. Watch our
                                    demo to discover how to easily browse,
                                    search, and manage your book collection,
                                    including features and tutorials.
                                </p>
                            </div>

                            <svg
                                class="size-6 shrink-0 self-center stroke-[#FF2D20]"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"
                                />
                            </svg>
                        </a>
                    </div>
                </main>

                <footer
                    class="py-16 text-center text-sm text-black dark:text-white/70"
                >
                    Figarts built with Laravel v{{ laravelVersion }} (PHP v{{
                        phpVersion
                    }})
                </footer>
            </div>
        </div>
    </div>
</template>
