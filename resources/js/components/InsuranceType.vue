<template>
    <div
        @click="model = value"
        class="transition p-6 rounded-2xl overflow-hidden border-2 border-transparent hover:border-primary-1000 cursor-pointer relative before:left-0 before:bottom-0 before:top-0 before:absolute before:w-full before:h-full before:-z-10 before:bg-gradient-to-r before:from-slate-900 before:to-slate-900/25"
        :class="{'border-primary-1000': model === value}"
    >
        <div class="absolute top-0 left-0 bottom-0 right-0 w-full h-full -z-20">
            <slot name="poster"></slot>
        </div>
        <div
            class="absolute transition top-0 end-0 w-10 h-10 rounded-es-2xl grid place-items-center text-white text-xl bg-primary-1000"
            :class="{'opacity-100': model === value, 'opacity-0': model !== value}"
        >
            <i class="fas fa-check"></i>
        </div>
        <div class="flex gap-6 items-center">
            <div class="w-16 h-16 bg-white rounded-xl grid place-items-center text-2xl text-primary-1000">
                <slot name="icon"></slot>
            </div>
            <div class="flex flex-col text-white gap-2">
                <h6 class="text-xl"><slot name="title"></slot></h6>
                <p class="font-light"><slot name="subtitle"></slot></p>
            </div>
        </div>
    </div>
</template>

<script setup>

const model = defineModel()
const props = defineProps({
    value: {
        type: Number,
        required: true
    }
})
</script>

<style scoped lang="scss">

</style>
