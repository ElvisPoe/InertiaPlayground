<template>
    <Head title="Login" />
    <main>
        <form @submit.prevent="submit">
            <h1>Login</h1>
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
                <button type="submit" :disabled="form.processing">Login</button>
            </div>
        </form>
    </main>
</template>

<script>
export default {
    layout: null
}
</script>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3"

let form = useForm({
    email: '',
    password: ''
})

let submit = () => {
    form.post('/login');
}
</script>

<style scoped>
form {
    max-width: 500px;
    position: absolute;
    left: 50%;
    top: 50%;
    width: 100%;
    transform: translate(-50%, -50%);
}

.input-wrapper {
    display: flex;
    flex-direction: column;
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
