<template>
#Component Registeration
  <div>
    <h2>Parent Component</h2>
    <ChildComponent title="Hello world" />   <!-- Passing data to child component-->
    <ChildComponent :title="childDetails.title" :id="childDetails.id"/>   <!-- Passing data to child component-->
  </div>
</template>

<script setup>
// Register the child component locally
import ChildComponent from './ChildComponent.vue' // Import the child component

const childDetails = {
  title: "hello world",
  id: 21
};
</script>
