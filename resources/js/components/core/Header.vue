<template>
    <header class="header">
        <div class="header__wrapper">
            <div class="container">
                <div class="header__box">

                    <div class="header__logo">
                        <a v-if="useRoute().name !== 'home'" href="/" title="Yolonce.ru">
                            <img alt="foplop.ru" src="/_assets/logo.webp" class="logo"/>
                        </a>
                        <img v-else alt="foplop.ru" src="/_assets/logo.webp" class="logo"/>
                    </div>

                    <div class="header__main-menu">
                        <a href="/slots">
                            <FopButton
                                fop_type="primary hover"
                                @click="()=>{}"
                            >
                                Торги
                            </FopButton>
                        </a>
                        <a class="text-href" href="/favorites">
                            Избранное
                        </a>
                        <a class="text-href" href="/categories">
                            категории
                        </a>
                        <a class="text-href" href="/for-broker">
                            Для брокера
                        </a>
                        <FopButton
                            fop_type="primary"
                            @click="()=>{}"
                        >
                            Сервисы
                        </FopButton>
                    </div>

                    <div class="header__auth">
                        <div class="header__login-btn">

                            <a href="/register">
                                <FopButton
                                    fop_type="primary hover"
                                    @click="()=>{}"
                                >
                                    Регистрация
                                </FopButton>
                            </a>

                            <a href="/login">
                                <FopButton
                                    fop_type="primary"
                                    @click="()=>{}"
                                >
                                    Вход
                                </FopButton>
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

            & .header__auth{
                & .header__login-btn{
                    & button{
                        margin-left: 16px;
                    }
                }
            }

            & .header__main-menu{
                display: flex;
                &>a,>button{
                    margin-right: 4vw;
                }
            }

        }

    }

}

</style>
