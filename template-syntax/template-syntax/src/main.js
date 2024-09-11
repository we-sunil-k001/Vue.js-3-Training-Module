import './assets/main.css';

import { createApp } from 'vue';
import App from './App.vue';
import Counter from './components/Counter.vue';
import TemplateSyntax from './components/TemplateSyntax.vue';
import ComputedComp from './components/ComputedComponent.vue';
import ClassComp from './components/ClassComponent.vue';
import StyleComp from './components/StyleComponent.vue';
import ConditionalComp from './components/ConditionalComponent.vue';
import ListRenderingComp from './components/ListRenderingComponent.vue';

const app = createApp(App);

app.component('Counter',Counter);
app.component('TemplateSyntax', TemplateSyntax);
app.component('ComputedComp', ComputedComp);
app.component('ClassComp', ClassComp);
app.component('StyleComp', StyleComp);
app.component('ConditionalComp', ConditionalComp);
app.component('ListRenderingComp', ListRenderingComp);
app.mount('#app');
