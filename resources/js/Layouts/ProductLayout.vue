<script setup>
import Navbar from "@/Components/Navbar/Navbar.vue";
import Toast from "@/Components/Toast.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
    page: {
        type: String,
        default: "",
    },
});
</script>

<script>
export default {
    components: { Toast },
    name: "Toast",
    data() {
        return {
            showToast: true,
        };
    },
    mounted() {
        setTimeout(() => (this.showToast = false), 3000);
    },
};
</script>

<template>
    <Head :title="page" />
    <Navbar />
    <div
        class="min-h-full sm:flex sm:flex-row sm:justify-between sm:items-center sm:p-10 md:p-20 lg:p-40 bg-base-100"
    >
        <h2 class="text-3xl font-bold">{{ page }}</h2>
        <slot />
    </div>
    <Toast
        v-if="showToast"
        :error="$page.props.flash.error"
        :success="$page.props.flash.success"
        :info="$page.props.flash.info"
    />
</template>
