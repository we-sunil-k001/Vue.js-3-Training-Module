# Vue.js-3-Training-Module

In Vue.js, **Vue Router** is an official library that enables navigation between different components or views, turning your Vue application into a **Single Page Application (SPA)**. It allows you to create routes that map to different components and handle client-side navigation.

### Key Concepts of Vue Router:

1. **Routes**: Define the URL and which component to load for that URL.
2. **Router View**: Where the matched component is displayed.
3. **Router Link**: Special `<router-link>` component to enable navigation between routes.
4. **Programmatic Navigation**: Navigating through JavaScript (e.g., redirecting after an action).
5. **Dynamic Routing**: Matching routes with dynamic segments (e.g., `/users/:id`).

---

### Installation of Vue Router:

If you're using Vue CLI, install Vue Router via npm:

```bash
npm install vue-router
```

---

### Basic Example of Vue Router

1. **Setting up routes**:
   
Create a `router.js` file to define routes: (can create this file anywhere, in project)

```js
// router.js
import { createRouter, createWebHistory } from 'vue-router';
import Home from './components/Home.vue';
import About from './components/About.vue';

const routes = [
  { path: '/', component: Home },     // Home route
  { path: '/about', component: About } // About route
];

const router = createRouter({
  history: createWebHistory(),
  routes, // short for `routes: routes`
});

export default router;
```

2. **App.vue** (Main Application):

```vue
<template>
  <div id="app">
    <nav>
      <router-link to="/">Home</router-link>
      <router-link to="/about">About</router-link>
    </nav>
    
    <!-- Route matching component will render here -->
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'App',
};
</script>
```

3. **Home.vue** (Component for the Home route):

```vue
<template>
  <div>
    <h1>Home Page</h1>
  </div>
</template>
```

4. **About.vue** (Component for the About route):

```vue
<template>
  <div>
    <h1>About Page</h1>
  </div>
</template>
```

5. **main.js**:     // will auto get setup after installing route

```js
import { createApp } from 'vue';
import App from './App.vue';
import router from './router'; // Import the router

const app = createApp(App);
app.use(router); // Use the router in your Vue app
app.mount('#app');
```

---

### Explanation:

1. **Router Creation**:
   - We define routes (`path` and `component`) in the `router.js` file.
   - The `createRouter` method creates the router, and `createWebHistory` allows us to use history mode (clean URLs without `#`).

2. **Router-Link**:
   - `<router-link>` creates clickable links for navigation. The `to` attribute determines the target route.

3. **Router-View**:
   - `<router-view>` is a placeholder that renders the component matching the current route.

---

### Dynamic Route Matching:

You can use dynamic routes to pass parameters to components.

```js
const routes = [
  { path: '/user/:id', component: User }, // ':id' is dynamic segment
];
```

In the `User.vue` component, you can access the route parameter like this:

```vue
<template>
  <div>
    <h2>User ID: {{ $route.params.id }}</h2>
  </div>
</template>
```

--IMP.

    In Vue's Options API, the $route object is globally available, so you don't need to explicitly import useRoute from Vue Router 
    when accessing route parameters in the template.

    Your code with {{ $route.params.name }} is sufficient to display the name parameter in the template, and you don’t need the 
    <script setup> block or useRoute in this case.

        <script setup>
        import { useRoute } from 'vue-router'

        const route = useRoute();
        const name = route.params.name;
        </script>


Vue Router is powerful for building SPAs, enabling seamless navigation between components, dynamic routing, and much more.