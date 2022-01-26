<template>
    <nav>
        <NavLink href="/" :active="$page.component === 'Home'">Home</NavLink>
        <NavLink href="/users" :active="$page.component === 'Users'">Users</NavLink>
        <NavLink href="/settings" :active="$page.component === 'Settings'">Settings</NavLink>

        <!-- POST Request with simple link -->
        <!-- <li><Link href="/logout" method="post" as="button" :data="{ foo : 'bar' }">Logout</Link></li> &lt;!&ndash; preserve-scroll &ndash;&gt;-->
    </nav>
</template>

<script>
import NavLink from "./NavLink";

export default {
    components: { NavLink },
};
</script>
