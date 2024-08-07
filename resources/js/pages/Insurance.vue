<template>
    <InsuranceLayout>
        <template #poster>
            <img src="@/assets/insurance/1.jpg" alt="" class="absolute inset-0 w-full h-full object-cover object-center">
        </template>
        <template #body>
            <template v-if="step === 0">
                <div class="flex flex-col gap-2">
                    <h1 class="font-medium text-3xl text-slate-800">Let's get started</h1>
                    <p class="text-slate-500 text-lg font-light">Please select on or more options below that you'd like to have quoted for insurance.</p>
                </div>
                <div class="flex flex-col gap-4">
                    <InsuranceType v-model="form.type" :value="0">
                        <template #poster>
                            <img src="@/assets/insurance/type/home.jpg" alt="" class="absolute inset-0 w-full h-full object-cover object-center">
                        </template>
                        <template #icon><i class="fas fa-home"></i></template>
                        <template #title>Home</template>
                        <template #subtitle>Your current or soon-to-be home</template>
                    </InsuranceType>
                    <InsuranceType v-model="form.type" :value="1">
                        <template #poster>
                            <img src="@/assets/insurance/type/auto.jpg" alt="" class="absolute inset-0 w-full h-full object-cover object-center">
                        </template>
                        <template #icon><i class="fas fa-cog"></i></template>
                        <template #title>Auto</template>
                        <template #subtitle>Your personal vehicle(s)</template>
                    </InsuranceType>
                    <InsuranceType v-model="form.type" :value="2">
                        <template #poster>
                            <img src="@/assets/insurance/type/recreational_vehicle.jpg" alt="" class="absolute inset-0 w-full h-full object-cover object-center">
                        </template>
                        <template #icon><i class="fas fa-cars"></i></template>
                        <template #title>Recreational Vehicle</template>
                        <template #subtitle>Your boat RV, motorcycle, etc</template>
                    </InsuranceType>
                </div>
            </template>
            <template v-if="step === 1">

            </template>
        </template>
        <template #footer>
            <template v-if="step === 0">
                <AppButton
                    :disabled="form.type === null"
                    @click="step = 1"
                >
                    Agree and Continue
                </AppButton>
                <p class="text-slate-500 leading-relaxed">By continuing this form you agree to share data with Franke Insurance Service as defined in the Terms of Use and Privacy Policy.</p>
            </template>
            <template v-else-if="step === 1">

            </template>
        </template>
    </InsuranceLayout>
</template>

<script setup>
import InsuranceLayout from "@/layouts/InsuranceLayout.vue";
import InsuranceType from "@/components/InsuranceType.vue";
import AppButton from "@/components/AppButton.vue";
import { ref } from "vue"
import {useForm} from "@inertiajs/vue3";

const step = ref(0)
const form = useForm({
    type: null,
})
</script>

<style scoped lang="scss">

</style>
