<template>
    <header class="header">
        <div class="header__wrapper">
            <div class="container-lk-header">
                <div class="header__box">

                    <div class="header__logo">
                        <img alt="foplop.ru" src="/_assets/logo.webp" class="logo"/>
                    </div>
                    <div class="header__title">
                        <div class="title-h1">
                            <h2>{{h1}}</h2>
                        </div>
                        <div class="title-menu">
                            <a class="text-href" href="/logout">
                                <font-awesome-icon :icon="['fas', 'fa-right-from-bracket']" />
                                &nbsp;
                                Выход
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>
<script setup>
import { useRouter, useRoute } from 'vue-router'
const props = defineProps({
    h1: {
        type: String,
        required: true
    }
})

</script>
<style scoped lang="scss">
@import "/resources/sass/_variables.scss";

.header {
    background-color: #fff;
    box-shadow: none;
    transition: .5s ease;

    position: fixed;
    width: 100%;
    z-index: 10;

    & .header__wrapper {
        border-bottom: 1px solid #ddd9ea;

        & .container-lk-header{
            margin: 0 auto;
            max-width: 1500px;
            width: 100%;
        }

        & .header__box {
            align-items: center;
            display: flex;
            height: 62px;
            justify-content: space-between;

            & .header__logo{
                display: flex;
                justify-content: center;
                margin-right: 64px;

                & .logo{width: 200px;}
            }

            & .header__title{
                display: flex;
                justify-content: space-between;
                width: 100%;

            }

        }

    }

}

</style>
