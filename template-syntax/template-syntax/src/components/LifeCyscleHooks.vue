<template>
<ol>
    <li>
        <div>
            <h2>Vue 3 Lifecycle Hooks Example</h2>
            <p>Message: {{ message }}</p>
            <button @click="updateMessage">Update Message</button>
        </div>
    </li>
</ol>
 
</template>


<script setup>
import { ref, onBeforeMount, onMounted, onBeforeUpdate, onUpdated, onBeforeUnmount, onUnmounted } from 'vue'

// Reactive state
const message = ref('Hello, Vue 3!')

// Lifecycle Hooks
onBeforeMount(() => {
  console.log('onBeforeMount: Component is about to mount.')
})

onMounted(() => {
  console.log('onMounted: Component has mounted.')
  // Example: Fetching data when the component is mounted
})

onBeforeUpdate(() => {
  console.log('onBeforeUpdate: Component is about to update.')
})

onUpdated(() => {
  console.log('onUpdated: Component has updated.')
})

onBeforeUnmount(() => {
  console.log('onBeforeUnmount: Component is about to be destroyed.')
  // Example: Cleanup resources
})

onUnmounted(() => {
  console.log('onUnmounted: Component has been destroyed.')
})

// Method to update message
const updateMessage = () => {
  message.value = 'Message updated!'
}
</script>

<style scoped>
h2 {
  color: #42b983;
}
</style>