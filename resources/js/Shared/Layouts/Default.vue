<template>
    <Head>
        <title>Inertia Playground</title>
        <meta type="description" content="Inergia Playground page info" head-key="description">
    </Head>

    <header>
        <Nav />
    </header>

    <main>
        <slot />
    </main>

</template>

<script setup>
import Nav from "../Nav"
</script>
