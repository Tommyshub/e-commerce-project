<script setup>
import Navbar from "../Components/Navbar/Navbar.vue";
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
    <div>
        <div
            class="min-h-fit flex flex-col sm:justify-center items-center mt-20 mb-20 sm:mt-25 md:mt-30 lg:mt-40 bg-base-100"
        >
            <h2 class="text-3xl font-bold">{{ page }}</h2>
            <div
                class="w-full sm:max-w-md mt-6 px-6 py-4 bg-base-200 text-white shadow-md overflow-hidden sm:rounded-lg"
            >
                <slot />
            </div>
        </div>
    </div>
    <Toast
        v-if="showToast"
        :error="$page.props.flash.error"
        :success="$page.props.flash.success"
        :info="$page.props.flash.info"
    />
</template>
