<script setup>
import Table from "@/Components/Table.vue";
// Temporary data for the table
let products = [
    {
        name: "Apple",
        price: 20,
        quantity: 2,
        subtotal: 40,
        total: 44,
    },
    {
        name: "Orange",
        price: 30,
        quantity: 2,
        subtotal: 60,
        total: 64,
    },
    {
        name: "Banana",
        price: 24,
        quantity: 2,
        subtotal: 48,
        total: 52,
    },
    {
        name: "Strawberry",
        price: 10,
        quantity: 1,
        subtotal: 10,
        total: 10,
    },
];
</script>

<template>
    <div class="dropdown dropdown-end">
        <label tabindex="0" class="btn btn-ghost btn-circle" for="cart">
            <div class="indicator">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                    />
                </svg>
                <span class="badge badge-sm indicator-item">8</span>
            </div>
        </label>
        <div
            tabindex="0"
            class="mt-3 card card-compact dropdown-content w-52 bg-base-200 shadow"
        >
            <div class="card-body">
                <span class="font-bold text-lg">8 Items</span>
                <span class="text-info">Subtotal: $999</span>
                <div class="card-actions">
                    <label
                        for="cart-modal"
                        class="btn btn-primary btn-block modal-button"
                        >view cart</label
                    >
                </div>
            </div>
        </div>
        <!-- Modal for the shopping cart -->
        <input type="checkbox" id="cart-modal" class="modal-toggle" />
        <label for="cart-modal" class="modal cursor-pointer">
            <label class="modal-box max-w-3xl relative" for="cart-modal">
                <h3 class="font-bold text-4xl text-center">Einkaufswagen</h3>

                <Table
                    v-if="products"
                    :products="products"
                    formClass="grid content-center mt-10"
                />
                <p v-else class="text-center mt-5 font-bold">
                    Dein Einkaufswagen ist leer. Bitte fügen Sie Produkte hinzu,
                    um fortzufahren.
                </p>

                <div class="modal-action">
                    <label
                        for="cart-modal"
                        class="btn btn-square absolute top-px right-px m-4"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            /></svg
                    ></label>
                    <label for="cart-modal" class="btn btn-primary w-full">
                        Kasse</label
                    >
                </div>
            </label>
        </label>
    </div>
</template>
