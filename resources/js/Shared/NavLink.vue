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
        background: black;
        padding: 10px;
        color: white;
    }
</style>
