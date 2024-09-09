<template>
#ListRenderingComp

<ol>
    <li v-for="employee in employees" :key="employee.id">
      {{ employee.name }} - {{ employee.position }}
    </li>

     <li v-for="(value, key) in user" :key="key">
      {{ key }}: {{ value }}
    </li>
</ol>
</template>

<script setup>
import { ref } from 'vue';

// Rendering a Range of Numbers
const employees = ref([
  { id: 1, name: 'John', position: 'Manager' },
  { id: 2, name: 'Jane', position: 'Developer' },
  { id: 3, name: 'Sam', position: 'Designer' }
]);


// Rendering an Object's Properties
const user = reactive({
  name: 'John Doe',
  age: 30,
  occupation: 'Developer'
});

</script>