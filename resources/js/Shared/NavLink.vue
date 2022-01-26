<template>
    <Link href="/"
          :class="{ 'active' : active }"
        >
        <slot />
    </Link>
    <!-- preserve-scroll if we want to -->
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: { Link },

    props: {
        active: Boolean
    }
};
</script>

<style scoped>
    .active {
        font-weight: 600;
    }
</style>
