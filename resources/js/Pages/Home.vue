<template>
    <Head title="Home" />

    <h1>Home, {{ $page.props.auth.user.name }}</h1>

    <p class="pt-50">{{ date }}</p>

</template>

<script setup>
defineProps({
    date: String
})
</script>

<style scoped>
.pt-50 {
    padding-top: 50px;
}
</style>
