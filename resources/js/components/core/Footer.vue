<template>
    <footer class="footer">
        <div class="container">
            <div class="footer__box">
                <div class="footer__box_column box_column_logo">
                    <div class="footer__logo">
                        <a v-if="useRoute().name !== 'home'" href="/" title="Yolonce.ru">
                            <img alt="foplop.ru" src="/_assets/logo-footer-negate.png" class="logo"/>
                        </a>
                        <img v-else alt="foplop.ru" src="/_assets/logo-footer-negate.png" class="logo"/>
                    </div>
                    <div class="info-foplop">
                        <p>
                            © Foplop, 2024 <br>
                            Все права защищены. <br>
                            Информация, размещённая на сайте, не является публичной офертой.
                        </p>
                        <p>Реклама. Информация о рекламодателе по ссылкам в статье.</p>
                    </div>
                </div>

                <div class="footer__box_column">

                </div>

                <div class="footer__box_column">
                    <span class="footer_list_title">Сервисы FopLop</span>
                    <ul>
                        <li><a class="text-href-negate" :href="'/slots'">Торги</a></li>
                        <li><a class="text-href-negate" :href="'/analytics'">Аналитика</a></li>
                        <li><a class="text-href-negate" :href="'/for-broker'">Для брокера</a></li>

                    </ul>
                </div>

                <div class="footer__box_column">
                    <span class="footer_list_title">Информация</span>
                    <ul>
                        <li><a class="text-href-negate" :href="'/contacts'">Контакты</a></li>
                        <li><a class="text-href-negate" :href="'/contacts'">О нас</a></li>
                        <li><a class="text-href-negate" :href="'/terms'">Пользовательское соглашение</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </footer>
</template>
<script setup>

import {useRoute} from "vue-router";
</script>
<style scoped lang="scss">
@import "/resources/sass/_variables.scss";

.footer {
    margin-top: 64px;
    background-color: $color-primary-2;
    padding-bottom: 40px;
    padding-top: 32px;

    box-shadow: inset 0 42px 50px -54px rgba(0,0,0,0.75);

    position: absolute;
    bottom: 0;
    width: 100%;

    & .info-foplop{
        margin-top: 32px;
        color: $text-gray-1;
    }
}

.footer_list_title {
    font-family: inherit;
    color: $color-primary-negate;
    font-size: 21px;
}
.footer_list_title ul{
    margin-top: 12px;
}
.footer__box_column{
    max-width: 300px;

    & li{
        list-style: none;
    }
}


.footer__box {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

</style>
