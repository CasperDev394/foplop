<template>
    <div class="login-container">
        <div class="login-content">

            <div class="login-form">
                <n-config-provider :theme-overrides="themeOverrides">
                    <n-input
                        style="max-width: 350px"
                        placeholder="email"
                        size="large"
                        v-model:value="email"
                        :input-props="{
                            type: 'email',
                            name: 'email',
                            id:'email',
                            autocomplete:'email'
                        }"

                        autofocus
                        required
                    />
                </n-config-provider>
<!--                <input-->
<!--                    v-model="email"-->
<!--                    type="email"-->
<!--                    name="email"-->
<!--                    id="email"-->
<!--                    autofocus-->
<!--                    placeholder="email"-->
<!--                    required-->
<!--                    autocomplete="email"-->
<!--                >-->
<!--                </input>-->

                <n-config-provider :theme-overrides="themeOverrides">
                    <n-input
                        style="max-width: 350px"
                        placeholder="пароль"
                        size="large"
                        v-model:value="password"

                        :input-props="{
                            type: 'password',
                            name: 'password',
                            id:'password',
                            autocomplete:'current-password'
                        }"
                        type="password"
                    />
                </n-config-provider>
<!--                <button-->
<!--                    type="submit"-->
<!--                >-->
<!--                    Войти-->
<!--                    <font-awesome-icon :icon="['fas', 'arrow-right']" />-->
<!--                </button>-->
                <FopButton
                    fop_type="primary"
                    @click="()=>{}"
                    type="submit"
                >
                    Войти
                    <font-awesome-icon :icon="['fas', 'arrow-right']" />
                </FopButton>


            </div>
            <span>
                <a class="text-href-invert" href="/register">Зарегистрироваться</a>
            </span>
        </div>
    </div>
</template>
<script setup>
import {ref} from 'vue'
import themeOverrides from "@/mixins/themeOverrides.js";


const email = ref('');
const password = ref('');

</script>
<style scoped lang="scss">
.login-container{
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    height: 100%;

    & .login-content{
        margin-top: 32px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        width: 400px;
        height: 400px;
        box-shadow: 0 5px 9px -1px #223c5033 inset;
        padding: 1em;
        padding-top: 64px;

        & .login-form{
            display: flex;
            flex-direction: column;
            align-items: stretch;
            width: 90%;

            & .n-config-provider{
                margin-bottom: 16px;
            }
        }
    }

}
</style>
