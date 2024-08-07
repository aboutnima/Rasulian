import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

// Css
import "/resources/css/font/inter.css";
import "/resources/css/fontawesome/css/all.scss";

// Ziggy
import { ZiggyVue } from 'ziggy-js';

// Primevue
import PrimeVue from 'primevue/config';
import Aura from '@primevue/themes/aura';
import { definePreset } from "@primevue/themes";

import ToastService from "primevue/toastservice";
import Toast from "primevue/toast";
import InputText from "primevue/inputtext";
import Select from "primevue/select";

// Primevue custom preset
const customPreset = definePreset(Aura, {
    components: {
        inputtext: {
            padding: {
                x: '1rem',
                y: '1rem',
            }
        },
        select: {
            padding: {
                x: '1rem',
                y: '1rem',
            }
        },
    }
})

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob('./pages/**/*.vue', {
            eager: true
        })
        return pages[`./pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)

            // Primevue
            .use(PrimeVue, {
                theme: {
                    preset: customPreset,
                    options: {
                        darkModeSelector: 'light'
                    }
                },
            })
            .use(ToastService)
            .component('PrimeToast', Toast)
            .component('PrimeInputText', InputText)
            .component('PrimeSelect', Select)

            // Ziggy
            .use(ZiggyVue)

            .mount(el)
    },
})
