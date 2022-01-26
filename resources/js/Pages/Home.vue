<template>
    <h1>Home, {{ $page.props.auth.user.name }}</h1>

    <Nav />

</template>

<script>
import  Nav from "../Shared/Nav";

export default {
    components: { Nav },
};
</script>
