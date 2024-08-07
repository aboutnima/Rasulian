<template>
    <button
        class="transition flex items-center gap-4 rounded-2xl w-full justify-center p-4 text-lg disabled:opacity-50 disabled:cursor-not-allowed"
        :class="[`severity-${severity}`]"
        :disabled="disabled || processing !== 0"
    >
        <slot></slot>
    </button>
</template>

<script setup>

const props = defineProps({
    severity: {
        type: String,
        default: 'primary'
    },
    disabled: {
        default: false,
        type: Boolean
    },
    processing: {
        default: 0,
        type: Number
    }
})
</script>

<style scoped lang="scss">
.severity-primary {
    @apply bg-primary-1000 text-white hover:opacity-75;
}
.severity-default {
    @apply hover:bg-primary-200 text-primary-1000;
}
</style>
