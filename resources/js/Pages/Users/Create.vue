<template>
    <Head title="Create User" />

    <div class="flex justify-space-between align-center">
        <h1>Create User</h1>
    </div>

    <form @submit.prevent="submit">
        <div class="input-wrapper">
            <label for="name">Name</label>
            <input v-model="form.name" type="text" id="name" name="name" placeholder="User Name" required>
            <small v-if="form.errors.name" class="error-message" v-text="form.errors.name"></small>
        </div>

        <div class="input-wrapper">
            <label for="email">Email</label>
            <input v-model="form.email" type="email" id="email" name="email" placeholder="User Email" required>
            <small v-if="form.errors.email" class="error-message" v-text="form.errors.email"></small>
        </div>

        <div class="input-wrapper">
            <label for="password">Password</label>
            <input v-model="form.password" type="password" id="password" name="password" placeholder="User Password" required>
            <small v-if="form.errors.password" class="error-message" v-text="form.errors.password"></small>
        </div>

        <div class="input-wrapper">
            <button type="submit" :disabled="form.processing">Save</button>
        </div>
    </form>



</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3"

let form = useForm({
    name: '',
    email: '',
    password: ''
})

let submit = () => {
    form.post('/users');
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
