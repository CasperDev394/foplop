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
import Home from './pages/Home.vue';

import AdminProfile from './pages/admin/Profile.vue';

import Sidebar from './components/Sidebar.vue';

app
    .component('Home', Home)
    .component('Login', Login)

    .component('AdminProfile', AdminProfile)

    .component('Sidebar', Sidebar)
    .component('font-awesome-icon', FontAwesomeIcon)


app.use(pinia)
app.mount('#app');
