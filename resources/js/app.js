import './bootstrap';

import { createApp } from 'vue';
import { createPinia } from 'pinia'
import naive from "naive-ui";

import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';

const pinia = createPinia()
const app = createApp({});

/* import the fontawesome */
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import {
    faUserSecret,
    faPaperclip,
    faXmark,
    faCheck,
    faTrash,
    faArrowRight,
    faPaperPlane,
    faCheckDouble,
    faFile,
    faBars,
    faArrowLeft,
    faPlay,
    faRightFromBracket,
    faLinesLeaning,
    faFloppyDisk,
    faPenToSquare,
} from '@fortawesome/free-solid-svg-icons'
library.add(faUserSecret)
library.add(faXmark)
library.add(faTrash)
library.add(faCheck)
library.add(faCheckDouble)
library.add(faPaperPlane)
library.add(faArrowRight)
library.add(faPaperclip)
library.add(faFile)
library.add(faBars)
library.add(faArrowLeft)
library.add(faPlay)
library.add(faRightFromBracket)
library.add(faLinesLeaning)
library.add(faFloppyDisk)
library.add(faPenToSquare)


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
import AdminSlots from './pages/admin/slots/Slots.vue';
import AdminSlot from './pages/admin/slots/Slot.vue';
import AdminDebtors from './pages/admin/debtors/Debtors.vue';
import AdminDebtor from './pages/admin/debtors/Debtor.vue';
import AdminCourts from './pages/admin/Courts.vue';
import AdminCourtDialog from './components/dialogs/AdminCourt.vue';
import AdminDirections from './pages/admin/Directions.vue';
import AdminDirectionDialog from './components/dialogs/AdminDirection.vue';
import AdminCategories from './pages/admin/Categories.vue';
import AdminCategoryDialog from './components/dialogs/AdminCategory.vue';
import AdminBrokers from './pages/admin/brokers/Brokers.vue';
import AdminBroker from './pages/admin/brokers/Broker.vue';

import Sidebar from './components/Sidebar.vue';
import HeaderApp from './components/core/Header.vue';
import FooterApp from './components/core/Footer.vue';


import HeaderLk from './components/lk/core/Header.vue';


import FopButton from './components/base/FopButton.vue';
import FopDialog from './components/base/FopDialog.vue';

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
    .component('AdminSlots', AdminSlots)
    .component('AdminSlot', AdminSlot)
    .component('AdminDebtors', AdminDebtors)
    .component('AdminDebtor', AdminDebtor)
    .component('AdminCourts', AdminCourts)
    .component('AdminCourtDialog', AdminCourtDialog)
    .component('AdminDirections', AdminDirections)
    .component('AdminDirectionDialog', AdminDirectionDialog)
    .component('AdminCategories', AdminCategories)
    .component('AdminCategoryDialog', AdminCategoryDialog)
    .component('AdminBrokers', AdminBrokers)
    .component('AdminBroker', AdminBroker)

    .component('Sidebar', Sidebar)
    .component('HeaderApp', HeaderApp)
    .component('FooterApp', FooterApp)

    .component('HeaderLk', HeaderLk)

    .component('FopButton', FopButton)
    .component('FopDialog', FopDialog)
    .component('font-awesome-icon', FontAwesomeIcon)
    .component('data-table', Vue3EasyDataTable)


app.use(pinia)
app.use(router)
app.use(naive)
app.mount('#app');
