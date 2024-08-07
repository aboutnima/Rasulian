<template>
    <div class="flex flex-col gap-2 w-full">
        <div class="flex items-center gap-2" v-if="label">
            <i class="fas fa-star-of-life text-red-400 text-[0.5rem]" v-if="required"></i>
            <p class="text-slate-600">{{label}}</p>
        </div>
        <div class="input">
            <slot></slot>
        </div>
        <div class="text-red-500 text-xs" v-if="error">
            <p>{{error}}</p>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    label: {
        type: String,
        required: false,
    },
    error: {
        type: String,
        required: false
    },
    required: {
        type: Boolean,
        default: true,
    }
})
</script>

<style lang="scss" scoped>
:deep(.input) {
    @apply w-full;
    > .p-inputtext, .p-component {
        @apply w-full;
    }
}
</style>
