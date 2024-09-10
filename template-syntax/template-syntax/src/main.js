import './assets/main.css';

import { createApp } from 'vue';
import App from './App.vue';
import LifeCyscleHooks from './components/LifeCyscleHooks.vue';
import TemplateRef from './components/TemplateRef.vue';
import ParentComponent from './components/ParentComponent.vue';

const app = createApp(App);

app.component('LifeCyscleHooks', LifeCyscleHooks);
app.component('TemplateRef', TemplateRef);
app.component('ParentComponent', ParentComponent);
app.mount('#app');
