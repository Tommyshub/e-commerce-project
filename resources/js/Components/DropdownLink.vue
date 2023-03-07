<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <Link
        class="block w-full px-4 py-2 text-left text-sm leading-5 shadow bg-base-200 hover:bg-slate-500 focus:outline-none focus:bg-slate-500 transition duration-150 ease-in-out"
    >
        <slot />
    </Link>
</template>
