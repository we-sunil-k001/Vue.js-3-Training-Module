<template>
    <h3># HTTP Requests</h3>
</template>

<script setup>
// Basic GET Request==============================

fetch('https://jsonplaceholder.typicode.com/users')
  .then(response => {
    // Check if the request was successful
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    // Parse the response as JSON
    return response.json();
  })
  .then(data => {
    console.log(data); // Handle the fetched data (an array of users)
  })
  .catch(error => {
    console.error('There was a problem with the fetch operation:', error);
  });

</script>


