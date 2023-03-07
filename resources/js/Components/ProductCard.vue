<template>
    <div class="card w-96 bg-base-200 shadow-xl">
        <figure class="px-5 pt-5">
            <img
                :src="`/storage/${images[0].path}`"
                alt="product image"
                class="rounded-xl"
            />
        </figure>
        <div class="card-body items-center text-center">
            <h2 class="card-title text-center">
                {{ name }}
            </h2>
            <p>{{ description }}</p>
            <div class="card-actions text-center">
                <button class="btn btn-primary">Details</button>
                <button class="btn btn-primary">Buy Now</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        images: {
            type: Array,
            required: true,
        },
        name: {
            type: String,
            required: true,
        },
        description: {
            type: String,
            required: true,
        },
    },
};
</script>
