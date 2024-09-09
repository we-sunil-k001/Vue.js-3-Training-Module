import './assets/main.css';

import { createApp } from 'vue';
import App from './App.vue';

import Counter from './components/Counter.vue';
const app = createApp(App);

app.component('Counter', Counter);  // Registering the component

app.mount('#app')
