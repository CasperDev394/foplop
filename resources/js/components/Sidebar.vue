<template>
    <div id="sidebar">
        <ul v-if="!isMobile">
            <li
                v-for="tab in tabs"
                class="tab"
                :class=" checkActive(tab) ? 'active' : ''"
            >
                <a :href="'/'+prefix+tab['href']">
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

const isMobile = ref(true);

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

    &:hover {background-color: #d3d3d3;}
}
.tab.active {
    background-color: antiquewhite;
    border-right: solid $color-primary 2px;
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
    padding-top: 55px;
    min-height: 100%;
    width: 230px;
    z-index: 810;
    position: fixed;
    background-color: #fff;


    > ul {
        margin: 0;
        padding: 0;

        > li {
            margin-bottom: 1rem;
        }
    }
}
</style>
