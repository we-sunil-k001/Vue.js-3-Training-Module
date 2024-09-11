<template>
    <!-- <h3>#Child to Parent Communication using Custom Event - SinglePost</h3> -->
  
    <div>ID: {{post.id}}</div>
    <div>Title: {{post.title}}</div>
    <div><button @click.prevent="$emit('editPost', post.id)">Edit Post</button></div>
</template>

<script setup>
const props = defineProps({
    post:{
        type: Object,
        required: true
    }
});
</script>