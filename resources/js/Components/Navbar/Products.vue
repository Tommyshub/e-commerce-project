<template>
    <div class="dropdown">
        <label tabindex="0" class="btn btn-ghost">Products</label>
        <ul
            tabindex="0"
            class="dropdown-content menu p-2 mt-3 shadow bg-base-200 rounded-box w-52 mb-2"
        >
            <li>
                <Link
                    href="/products"
                    class="btn btn-ghost normal-case justify-between"
                >
                    All Products
                </Link>
            </li>
            <li>
                <Link
                    href="/products/create"
                    class="btn btn-ghost normal-case justify-between"
                >
                    Create Product
                </Link>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
