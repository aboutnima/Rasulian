<template>
    <App>
        <div class="grid grid-cols-[repeat(2,minmax(0,1fr))] gap-16 min-h-screen">
            <div class="relative w-full h-full">
                <slot name="poster"></slot>
            </div>
            <div class="h-full flex flex-col gap-8 justify-center ps-8 pe-24 py-36">
                <div class="flex flex-col gap-2">
                    <h1 class="font-medium text-3xl text-slate-800"><slot name="title"></slot></h1>
                    <p class="text-slate-500 text-lg font-light"><slot name="subtitle"></slot></p>
                </div>
                <div class="flex flex-col gap-4">
                    <slot name="body"></slot>
                </div>
                <div class="flex flex-col gap-4">
                    <slot name="footer"></slot>
                </div>
            </div>
        </div>
    </App>
</template>

<script setup>
import App from "@/pages/App.vue";
</script>

<style scoped lang="scss">

</style>
