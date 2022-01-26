import { createApp, h } from 'vue'
import { createInertiaApp, Link } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from "@inertiajs/progress";
import Default from "./Shared/Layouts/Default"

createInertiaApp({
    resolve: async name => {
        let page = (await import(`./Pages/${name}`)).default;
        page.layout ??= Default;
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Link', Link) // Global Component Registration
            .mount(el)
    },
});

InertiaProgress.init({
    color: 'Blue',
    showSpinner: true,
});
