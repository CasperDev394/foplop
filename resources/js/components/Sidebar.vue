<template>
    <div id="sidebar">
        <ul>
            <li
                v-for="tab in tabs"
                class="tab"
                :class=" checkActive(tab) ? 'active' : ''"
            >
                <a :href="'/'+prefix+tab['href']">
                    <font-awesome-icon  style="    padding-top: 6px;" :icon="'fa-solid '+ tab['icon']" />
                    &nbsp;
                    {{ tab['text'] }}</a>
            </li>
        </ul>
    </div>
</template>
<script setup>
import {ref} from "vue";

const props = defineProps({
    tabs: {},
    prefix: {
        type: String,
        required: true
    }
})


const currentUrl = () => {
    return window.location.pathname;
}
const checkActive = (tab) => {
    return currentUrl().includes(tab['href'])
}

</script>
<style lang="scss" scoped>
@import '/resources/sass/_variables.scss';

.tab {
    list-style-type: none;

    &:hover {background-color: rgba(118, 181, 181, 0.3);}
}
.tab.active {
    background-color: $color-primary-1;
    border-right: solid $color-primary-4 2px;

    &>a{
        color: white;
    }

}

.tab > a {
    display: flow;
    text-decoration: none;
    font-family: revert;
    color: $color-text-primary;
    font-size: 21px;

    padding: 6px 20px;
}
#sidebar {
    top: 0;
    left: 0;
    padding-top: 63px;
    min-height: 100%;
    width: 235px;
    z-index: 9;
    position: fixed;
    background-color: #fff;


    > ul {
        margin: 0;
        padding: 0;

        > li {

        }
    }
}
</style>
