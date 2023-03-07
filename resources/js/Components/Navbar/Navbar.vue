<template>
    <!-- Header -->
    <header class="bg-white shadow" v-if="$slots.header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <slot name="header" />
        </div>
    </header>
    <!-- Navbar -->
    <div class="navbar bg-base-200 flex justify-between">
        <!-- Content aligned to the left -->
        <div class="flex-1">
            <!-- Logo -->
            <Logo />
            <!-- Product Links  -->
            <div class="ml-10">
                <Products />
            </div>
        </div>
        <!-- To align content to center use: flex-1 items-center justify-center -->

        <!-- Content aligned to the right -->
        <div class="flex-1 justify-end">
            <!-- Search Bar -->
            <Search />
            <!--Shopping Cart-->
            <Cart />
            <!--Profile Dropdown -->
            <Profile />
        </div>
    </div>
</template>

<script setup>
import Cart from "@/Components/Navbar/Cart.vue";
import Profile from "@/Components/Navbar/Profile.vue";
import Search from "@/Components/Navbar/Search.vue";
import Logo from "@/Components/Navbar/Logo.vue";
import Products from "@/Components/Navbar/Products.vue";
</script>
