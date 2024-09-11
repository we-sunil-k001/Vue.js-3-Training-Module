<template>
    <h3>#Component teleporting</h3>
    <p> <strong>Teleport</strong> is a feature that allows you to move (or "teleport") HTML elements from their normal location in the component tree to another part of the DOM.
    <br><br>
    Imagine This:<br>
    You have a modal (popup) that normally would be placed deep inside a component tree, but you want it to appear at the very top of the page (outside the component). With Teleport, you can move the modal to the top-level of the DOM while still controlling it from your component. 
    <br><br>
    to Attribute: The to attribute tells Vue where to teleport the content. In this example, we are teleporting to body.
    
    </p>

    <!-- <div>
    <button @click="showModal = true">Show Modal</button>

    <teleport to="#modal-container">
      <div v-if="showModal" class="modal">
        <p>This modal is teleported to #modal-container!</p>
        <button @click="showModal = false">Close</button>
      </div>
    </teleport>
  </div> -->

</template>

<script setup>
    // import { ref } from 'vue'

    // const showModal = ref(false)
</script>