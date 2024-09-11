<template>
  <div>
    <!-- Input where the user can type -->
    <input type="text" :value="modelValue" @input="updateInput">
  </div>
</template>

<script setup>
// Use props to receive data from the parent (using 'modelValue' instead of 'value')
const props = defineProps({
  modelValue: String
})

// Emit the updated value back to the parent
const emit = defineEmits(['update:modelValue'])

const updateInput = (event) => {
  emit('update:modelValue', event.target.value) // Send the new value to the parent
}
</script>
