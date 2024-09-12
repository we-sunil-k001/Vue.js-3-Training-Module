<template>
  <div id="app">
    <nav>
      <router-link to="/">Home</router-link><br>
      <router-link to="/about">About</router-link><br>
      <router-link to="/login">Login</router-link><br>
      <router-link to="/profile/ramesh">Ramesh's Profile</router-link><br>
      <router-link to="/profile/suresh">Suresh's Profile</router-link><br>
      <router-link to="/profile/rakesh">Rakesh's Profile</router-link><br>
    </nav>
    
    <!-- Route matching component will render here -->
    <router-view></router-view>   <!--Imp. to add, this will show the content of the route -->
  </div>
</template>

<script>
export default {
  name: 'App',
};
</script>
