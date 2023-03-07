<template>
    <div class="relative" v-auto-animate>
        <input
            ref="searchInput"
            type="text"
            placeholder="Produkt finden"
            class="input input-bordered w-full max-w-xs mx-auto"
            v-if="showSearch"
            v-click-away="onClickAway"
        />
    </div>
    <i
        @click="showSearch = !showSearch"
        v-if="!showSearch"
        class="cursor-pointer"
    >
        <img
            src="../../../../public/images/magnifying-glass.png"
            alt="search icon"
            class="w-7 h-7"
        />
    </i>
</template>

<script>
export default {
    data() {
        // Show search input when clicking on search icon
        return {
            showSearch: false,
        };
    },
    methods: {
        // Close search input when clicking outside of element
        onClickAway() {
            this.showSearch = false;
        },
        // Close search input when submitting search query
        onSubmit() {
            // TODO: Implement search functionality
            this.showSearch = false;
        },
    },
};
</script>
