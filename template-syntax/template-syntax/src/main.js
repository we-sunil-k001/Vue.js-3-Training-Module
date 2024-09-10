import './assets/main.css';

import { createApp } from 'vue';
import App from './App.vue';
import LifeCyscleHooks from './components/LifeCyscleHooks.vue';

const app = createApp(App);

app.component('LifeCyscleHooks', LifeCyscleHooks);
app.mount('#app');
