<template>
#template ref
  <input ref="myInput" type="text" placeholder="Type something here" />
  <button @click="focusInput">Focus Input</button>
</template>

<script setup>
import { ref, onMounted } from 'vue'

// Create a template ref
const myInput = ref(null)

// Ensure ref is available after mounting
onMounted(() => {
  console.log('Input element:', myInput.value)
})
</script>
