// router.js
import { createRouter, createWebHistory } from 'vue-router';    

import Home from './components/Home.vue';   //import component
import About from './components/About.vue';   //import component
import Login from './components/Login.vue';   //import component
import Profile from './components/Profile.vue';   //import component

const routes = [
  { path: '/', component: Home },     // Home route
  { path: '/about', component: About }, // About route
  { path: '/login', component: Login }, // login route
  { path: '/profile/:name', component: Profile } //  ':name' is dynamic here
];

const router = createRouter({
  history: createWebHistory(),
  routes, // short for `routes: routes`
});

export default router;