import './assets/main.css'
import { createPinia } from 'pinia';

import { createApp } from 'vue'
import App from './App.vue'

createApp(App).use(createPinia()).mount('#app')

// OR===============

// import { createPinia } from 'pinia';
// const pinia = createPinia();
// app.use(pinia);
