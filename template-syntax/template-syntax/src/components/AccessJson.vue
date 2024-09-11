<template>
  <h3># Access JSON</h3>
  <p v-for="user in users" :key="user.id">{{ user.name }}</p>
</template>

<script>
import userData from '../User.json'; // Import JSON file

export default {
  data() {
    return {
      users: userData.users, // Access the `users` property from the imported JSON
    };
  },
};
</script>
