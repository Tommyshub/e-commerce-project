<script setup>
defineProps({
    error: {
        type: String,
        default: "",
    },
    success: {
        type: String,
        default: "",
    },
    info: {
        type: String,
        default: "",
    },
});
</script>

<template>
    <!-- Gets flash message from $page.props.flash.name -->
    <div>
        <div class="toast toast-end">
            <div v-if="error" class="alert alert-error">
                <div>
                    <span>{{ error }}</span>
                </div>
            </div>
            <div v-if="success" class="alert alert-success">
                <div>
                    <span>{{ success }}</span>
                </div>
            </div>
            <div v-if="info" class="alert alert-info">
                <div>
                    <span>{{ info }}</span>
                </div>
            </div>
        </div>
    </div>
</template>
