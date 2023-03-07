<script setup>
defineProps({
    formClass: {
        type: String,
        default: "",
    },
    products: {
        type: Array,
        default: "",
    },
});
</script>

<template>
    <div :class="formClass">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
                <tr>
                    <th>Produktinformation</th>
                    <th>Menge</th>
                    <th>Preis</th>
                    <th>Zwischensumme</th>
                    <th>Gesamt</th>
                    <th>Plus</th>
                    <th>Minus</th>
                </tr>
            </thead>
            <tbody v-for="product in products">
                <tr>
                    <th>{{ product.name }}</th>
                    <td>{{ product.quantity }}</td>
                    <th>{{ product.price }} €</th>
                    <td>{{ product.subtotal }} €</td>
                    <td>{{ product.total }} €</td>
                    <td>
                        <button class="btn-sm rounded btn-primary">-</button>
                    </td>
                    <td>
                        <button class="btn-sm rounded btn-primary">+</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
