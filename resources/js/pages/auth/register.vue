<template>
    <div class="login-container">
        <div class="login-content">

            <!--            <img alt="FopLop" />-->

            <div class="login-form">
                <input
                    v-model="email"
                    type="email"
                    name="email"
                    id="email"
                    autofocus
                    placeholder="email"
                    required
                    autocomplete="email"
                >
                </input>
                <input
                    v-model="password"
                    placeholder="пароль"
                    type="password"
                    name="password"
                    id="password"
                    autocomplete="current-password"
                >
                <button
                    type="submit"
                >
                    Зарегистрироваться
                    <font-awesome-icon :icon="['fas', 'arrow-right']" />
                </button>


            </div>
            <span>
                <a href="/login">Войти</a>
            </span>
        </div>
    </div>
</template>
<script setup>
import {ref} from 'vue'


const email = ref('');
const password = ref('');

</script>
