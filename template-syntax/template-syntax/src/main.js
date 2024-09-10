import './assets/main.css';

import { createApp } from 'vue';
import App from './App.vue';

import EventHandlingComp from './components/EventHandling.vue';
import FormInputComp from './components/FormInput.vue';

const app = createApp(App);


app.component('EventHandlingComp', EventHandlingComp);
app.component('FormInputComp', FormInputComp);

app.mount('#app');
