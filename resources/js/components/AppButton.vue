<template>
    <button
        class="transition bg-primary-1000 text-white flex items-center gap-4 rounded-2xl w-full justify-center p-4 text-lg hover:opacity-75 disabled:opacity-50 disabled:cursor-not-allowed"
        :disabled="disabled || processing !== 0"
    >
        <slot></slot>
    </button>
</template>

<script setup>

const props = defineProps({
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

</style>
