<template>
    <!-- Paginator -->
    <div class="paginator">
        <Component
            :is="link.url ? 'Link' : 'span'"
            v-for="link in links"
            :href="link.url"
            v-html="link.label"
            :class="{ 'active' : link.active }"
        />
    </div>
</template>

<script setup>
defineProps({
    links: Array
})
</script>

<style scoped>
    .paginator {
        margin: 15px 10px;
        text-align: center;
    }
    .paginator a {
        padding: 5px;
    }
    .paginator .active {
        font-weight: 800;
    }
</style>
