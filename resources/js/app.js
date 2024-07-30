import './bootstrap';

import '../css/app.css';

import { createApp } from 'vue';
import app from './App.vue';
import router from './router/index.js';
// main.js or main.ts



createApp(app).use(router).mount('#app');






/*createApp({
    components: {
        TestComponent
    }
}).mount('#app');*/
