<template>
    <Head title="Create User" />

    <div class="flex justify-space-between align-center">
        <h1>Create User</h1>

<!--        <button>Save</button>-->
    </div>

    <form @submit.prevent="submit">
        <div class="input-wrapper">
            <label for="name">Name</label>
            <input v-model="form.name" type="text" id="name" name="name" placeholder="User Name" required>
            <small v-if="$page.props.errors.name" class="error-message" v-text="$page.props.errors.name"></small>
        </div>

        <div class="input-wrapper">
            <label for="email">Email</label>
            <input v-model="form.email" type="email" id="email" name="email" placeholder="User Email" required>
            <small v-if="errors.email" class="error-message" v-text="errors.email"></small>
        </div>

        <div class="input-wrapper">
            <label for="password">Password</label>
            <input v-model="form.password" type="password" id="password" name="password" placeholder="User Password" required>
            <small v-if="errors.password" class="error-message" v-text="errors.password"></small>
        </div>

        <div class="input-wrapper">
            <button type="submit">Save</button>
        </div>
    </form>



</template>

<script setup>
import { reactive } from "vue";
import {Inertia} from "@inertiajs/inertia";

defineProps({
    errors: Object
})

let form = reactive({
    name: '',
    email: '',
    password: ''
})

let submit = () => {
    Inertia.post('/users', form);
}
</script>

<style scoped>
.input-wrapper {
    display: flex;
    flex-direction: column;
    max-width: 500px;
    margin: 0 auto 15px;
}

.input-wrapper label {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 5px;
}

.input-wrapper input {
    padding: 10px;
    border-radius: 0;
    border: 1px solid black;
    outline: none;
    font-size: 18px;
}

.input-wrapper button {
    margin: 0;
    padding: 15px;
}
</style>
