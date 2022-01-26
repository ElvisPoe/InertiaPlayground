<template>
    <Head>
        <title>Users</title>
        <meta type="description" content="Users page info" head-key="description">
    </Head>

    <div class="flex justify-space-between align-center">
        <div class="flex justify-space-between align-center">
            <h1>Users</h1>
            <Link href="/users/create" as="button">Add New</Link>
        </div>
        <input type="text" v-model="search" id="search" name="search" placeholder="Search..">
    </div>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <tr v-for="user in users.data" :key=user.id>
            <td v-text="user.name"></td>
            <td v-text="user.email"></td>
            <td>
                <Link :href="`/users/${user.id}/edit`" as="button">Edit</Link>
                <Link :href="`/users/${user.id}/delete`" as="button">Delete</Link>
            </td>
        </tr>
    </table>

    <Paginator :links="users.links" />

</template>

<script setup>
import Paginator from "../../Shared/Paginator";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia"

let props = defineProps({
    users: Object,
    filters: Object
})

let search = ref(props.filters.search); // Set the default Search Value

watch(search, value => {
    Inertia.get('/users', {search: value}, {
        preserveState: true, // No losing the search value
        replace: true // Not adding every request as a new back route
    });
})

</script>

<style>
    input {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid;
    }
</style>
