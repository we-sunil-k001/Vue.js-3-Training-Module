import './assets/main.css';

import { createApp } from 'vue';
import App from './App.vue';

import EventHandlingComp from './components/EventHandling.vue';

const app = createApp(App);


app.component('EventHandlingComp', EventHandlingComp);

app.mount('#app');
