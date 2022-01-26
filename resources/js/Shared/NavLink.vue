<template>
    <Link href="/"
          :class="{ 'active' : active }"
        >
        <slot />
    </Link>
    <!-- preserve-scroll if we want to -->
</template>

<script setup>

defineProps({
    active: Boolean
})

</script>

<style scoped>
    .active {
        font-weight: 600;
    }
</style>
