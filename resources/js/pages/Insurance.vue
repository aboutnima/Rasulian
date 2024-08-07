<template>
    <InsuranceLayout v-if="step === 0">
        <template #poster>
            <img src="@/assets/insurance/1.jpg" alt="" class="absolute inset-0 w-full h-full object-cover object-center">
        </template>
        <template #title>Let's get started</template>
        <template #subtitle>Please select on or more options below that you'd like to have quoted for insurance.</template>
        <template #body>
            <div class="flex flex-col gap-4">
                <InsuranceType v-model="form.type" :value="insuranceType.find((item) => item.name === 'Home').value">
                    <template #poster>
                        <img src="@/assets/insurance/type/home.jpg" alt="" class="absolute inset-0 w-full h-full object-cover object-center">
                    </template>
                    <template #icon><i class="fas fa-home"></i></template>
                    <template #title>Home</template>
                    <template #subtitle>Your current or soon-to-be home</template>
                </InsuranceType>
                <InsuranceType v-model="form.type" :value="insuranceType.find((item) => item.name === 'Auto').value">
                    <template #poster>
                        <img src="@/assets/insurance/type/auto.jpg" alt="" class="absolute inset-0 w-full h-full object-cover object-center">
                    </template>
                    <template #icon><i class="fas fa-cog"></i></template>
                    <template #title>Auto</template>
                    <template #subtitle>Your personal vehicle(s)</template>
                </InsuranceType>
                <InsuranceType v-model="form.type" :value="insuranceType.find((item) => item.name === 'RecreationalVehicle').value">
                    <template #poster>
                        <img src="@/assets/insurance/type/recreational_vehicle.jpg" alt="" class="absolute inset-0 w-full h-full object-cover object-center">
                    </template>
                    <template #icon><i class="fas fa-cars"></i></template>
                    <template #title>Recreational Vehicle</template>
                    <template #subtitle>Your boat RV, motorcycle, etc</template>
                </InsuranceType>
            </div>
        </template>
        <template #footer>
            <AppButton
                :disabled="form.type === null"
                @click="step = 1"
            >
                Agree and Continue
            </AppButton>
            <p class="text-slate-500 leading-relaxed">By continuing this form you agree to share data with Franke Insurance Service as defined in the Terms of Use and Privacy Policy.</p>
        </template>
    </InsuranceLayout>
    <InsuranceLayout v-if="step === 1">
        <template #poster>
            <img src="@/assets/insurance/2.jpg" alt="" class="absolute inset-0 w-full h-full object-cover object-center">
        </template>
        <template #title>Personal Information</template>
        <template #subtitle>Ok, Great! Before we continue, please let us know how we can contact you regarding your quote.</template>
        <template #body>
            <div class="grid grid-cols-12 gap-8">
                <div class="col-span-6">
                    <AppInputFormat label="First Name">
                        <PrimeInputText v-model="form.firstname" placeholder="Enter First Name" />
                    </AppInputFormat>
                </div>
                <div class="col-span-6">
                    <AppInputFormat label="Last Name">
                        <PrimeInputText v-model="form.lastname" placeholder="Enter Last Name" />
                    </AppInputFormat>
                </div>
                <div class="col-span-12">
                    <AppInputFormat label="Email Address">
                        <PrimeInputText v-model="form.email" placeholder="Enter Email Address" />
                    </AppInputFormat>
                </div>
                <div class="col-span-12">
                    <AppInputFormat label="Phone No">
                        <PrimeInputText v-model="form.phone" placeholder="Enter Phone No" />
                    </AppInputFormat>
                </div>
                <div class="col-span-12">
                    <AppInputFormat label="Contact Preference">
                        <PrimeSelect
                            v-model="form.contact_preference"
                            :options="userContactPreference"
                            option-label="name"
                            option-value="value"
                            filter
                        />
                    </AppInputFormat>
                </div>
            </div>
        </template>
        <template #footer>
            <AppButton @click="step = 2">Continue</AppButton>
            <AppButton @click="step--" severity="default">Back</AppButton>
        </template>
    </InsuranceLayout>
    <InsuranceLayout v-if="step === 2">
        <template #poster>
            <img src="@/assets/insurance/3.jpg" alt="" class="absolute inset-0 w-full h-full object-cover object-center">
        </template>
        <template #title>Address Information</template>
        <template #subtitle>We can help with that! What is your address?</template>
        <template #body>
            <div class="grid grid-cols-12 gap-8">
                <div class="col-span-6">
                    <AppInputFormat label="Street Address" :required="false">
                        <PrimeInputText v-model="form.street" placeholder="Enter Street Address" />
                    </AppInputFormat>
                </div>
                <div class="col-span-6">
                    <AppInputFormat label="Ste/Apt" :required="false">
                        <PrimeInputText v-model="form.ste_apt" placeholder="-" />
                    </AppInputFormat>
                </div>
                <div class="col-span-12">
                    <AppInputFormat label="City">
                        <PrimeInputText v-model="form.city" placeholder="Enter City" />
                    </AppInputFormat>
                </div>
                <div class="col-span-12">
                    <AppInputFormat label="State">
                        <PrimeSelect
                            v-model="form.state"
                            :options="states"
                            option-label="name"
                            option-value="value"
                            filter
                        />
                    </AppInputFormat>
                </div>
                <div class="col-span-12">
                    <AppInputFormat label="Zip Code">
                        <PrimeInputText v-model="form.zipcode" placeholder="Enter Zip Code" />
                    </AppInputFormat>
                </div>
            </div>
        </template>
        <template #footer>
            <AppButton>Submit</AppButton>
            <AppButton @click="step--" severity="default">Back</AppButton>
        </template>
    </InsuranceLayout>
</template>

<script setup>
import { ref } from "vue"
import {useForm} from "@inertiajs/vue3";
import InsuranceLayout from "@/layouts/InsuranceLayout.vue";
import InsuranceType from "@/components/InsuranceType.vue";
import AppButton from "@/components/AppButton.vue";
import AppInputFormat from "@/components/AppInputFormat.vue";

const props = defineProps({
    insuranceType: Array,
    userContactPreference: Array,
    states: Array
})

const step = ref(0)
const form = useForm({
    type: null,
    firstname: '',
    lastname: '',
    email: '',
    phone: '',
    contact_preference: '0',
    street: '',
    ste_apt: '',
    city: '',
    state: '',
    zipcode: '',
})
</script>

<style scoped lang="scss">

</style>
