import './assets/main.css';

import { createApp } from 'vue';
import App from './App.vue';
import LifeCyscleHooks from './components/LifeCyscleHooks.vue';
import TemplateRef from './components/TemplateRef.vue';
import ParentComponent from './components/ParentComponent.vue';
import PostComponent from './components/Post.vue';
import VmodelParentComp from './components/Component v-model to send and update Data/ParentComp.vue';

const app = createApp(App);

app.component('LifeCyscleHooks', LifeCyscleHooks);
app.component('TemplateRef', TemplateRef);
app.component('ParentComponent', ParentComponent);
app.component('PostComponent', PostComponent);
app.component('VmodelParentComp', VmodelParentComp);
app.mount('#app');
