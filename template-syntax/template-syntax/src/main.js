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
import EventHandlingComp from './components/EventHandling.vue';
import FormInputComp from './components/FormInput.vue';
import WatchComponent from './components/WatchComponent.vue';
import SlotComponent from './components/SlotComponent.vue';

const app = createApp(App);

app.component('Counter',Counter);
app.component('TemplateSyntax', TemplateSyntax);
app.component('ComputedComp', ComputedComp);
app.component('ClassComp', ClassComp);
app.component('StyleComp', StyleComp);
app.component('ConditionalComp', ConditionalComp);
app.component('ListRenderingComp', ListRenderingComp);
app.component('EventHandlingComp', EventHandlingComp);
app.component('FormInputComp', FormInputComp);
app.component('WatchComponent', WatchComponent);
app.component('SlotComponent', SlotComponent);

app.mount('#app');
