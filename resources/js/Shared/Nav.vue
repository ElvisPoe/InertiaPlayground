<template>
    <div class="nav-wrapper flex justify-space-between align-center">
        <div>
            <h2><a href="/">Inertia Playground</a></h2>
        </div>
        <nav>
            <NavLink href="/" :active="$page.component === 'Home'">Home</NavLink>
            <NavLink href="/users" :active="$page.component === 'Users'">Users</NavLink>
            <NavLink href="/settings" :active="$page.component === 'Settings'">Settings</NavLink>
            <NavLink href="/logout" method="post" as="button">Logout</NavLink>

            <!-- POST Request with simple link -->
            <!-- <li><Link href="/logout" method="post" as="button" :data="{ foo : 'bar' }">Logout</Link></li> &lt;!&ndash; preserve-scroll &ndash;&gt;-->
        </nav>
    </div>
</template>

<script setup>
import NavLink from "./NavLink";
</script>

<style>
.nav-wrapper {
    background: lightgray;
    padding: 5px 15px;
}

.nav-wrapper nav a {
    padding: 0 15px;
}
</style>
