<template>
  <div>
    <h3>#Component v-model to send and update Data</h3>
    <p>Input from Child: {{ parentInput }}</p>
    <!-- Bind the 'parentInput' to the child component using v-model -->
    <ChildInput v-model="parentInput" />
  </div>
</template>

<script setup>
import { ref } from 'vue'
import ChildInput from './ChildInput.vue'

// Parent data (initially empty)
const parentInput = ref('')
</script>
