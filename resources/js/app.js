import './bootstrap';

import { createApp } from 'vue';
import { createPinia } from 'pinia'

const pinia = createPinia()
const app = createApp({});

/* import the fontawesome */
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faUserSecret, faPaperclip, faXmark, faTrash, faArrowRight, faPaperPlane, faCheckDouble, faFile, faBars, faArrowLeft, faPlay } from '@fortawesome/free-solid-svg-icons'
library.add(faUserSecret)
library.add(faXmark)
library.add(faTrash)
library.add(faCheckDouble)
library.add(faPaperPlane)
library.add(faArrowRight)
library.add(faPaperclip)
library.add(faFile)
library.add(faBars)
library.add(faArrowLeft)
library.add(faPlay)


import Login from './pages/auth/login.vue';
import Register from './pages/auth/register.vue';
import Home from './pages/Home.vue';
import MainFirst from './components/content/main/First.vue';

import Slots from './pages/slots/[...search].vue';
import SearchTopBlock from './components/content/search/TopBlock.vue';
import Favorites from './pages/Favorites.vue';
import Categories from './pages/Categories.vue';
import ForBroker from './pages/ForBroker.vue';

import AdminProfile from './pages/admin/Profile.vue';

import Sidebar from './components/Sidebar.vue';
import HeaderApp from './components/core/Header.vue';
import FooterApp from './components/core/Footer.vue';


import FopButton from './components/base/FopButton.vue';

import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    routes: [
        {path: '/', name:'home'},
        {path: '/login', name:'login'},
    ],
    history: createWebHistory()
})

app
    .component('Home', Home)
    .component('MainFirst', MainFirst)

    .component('Slots', Slots)
    .component('SearchTopBlock', SearchTopBlock)
    .component('Favorites', Favorites)
    .component('Categories', Categories)
    .component('ForBroker', ForBroker)


    .component('Login', Login)
    .component('Register', Register)

    .component('AdminProfile', AdminProfile)

    .component('Sidebar', Sidebar)
    .component('HeaderApp', HeaderApp)
    .component('FooterApp', FooterApp)
    .component('FopButton', FopButton)
    .component('font-awesome-icon', FontAwesomeIcon)


app.use(pinia)
app.use(router)
app.mount('#app');
