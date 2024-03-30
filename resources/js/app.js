import './bootstrap';

import { createApp } from 'vue';
import { createPinia } from 'pinia'

const pinia = createPinia()
const app = createApp({});


import Test from './components/Test.vue';

app
    .component('Test', Test)


app.use(pinia)
app.mount('#app');
