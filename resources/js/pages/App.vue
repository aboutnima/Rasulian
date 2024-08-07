<template>
    <PrimeToast position="bottom-left" />
    <slot></slot>
</template>

<script setup>
import {usePage} from "@inertiajs/vue3";
import {computed, watch, nextTick} from "vue";
import {useToast} from "primevue/usetoast";

const page = usePage();
const toast = useToast();

// Toast
const flash = computed(() => page.props.flash);
watch(flash, (value) => {
    if (value?.success || value?.error) {
        nextTick(() => {
            value.error?.forEach((message) => {
                toast.add({
                    severity: 'error',
                    detail: message,
                    life: 3000,
                });
            });
            value.success?.forEach((message) => {
                toast.add({
                    severity: 'success',
                    detail: message,
                    life: 3000,
                });
            });
        });
    }
}, {
    immediate: true,
    deep: true,
});
</script>

<style scoped>

</style>
