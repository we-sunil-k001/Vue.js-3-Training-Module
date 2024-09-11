<template>
<h4>#Child to Parent Communication using Custom Event</h4>
<ol>
    <li>
        <h3>Post Details</h3>
        <SinglePost v-for="post in posts" :post="post" :key="post.id" @edit-post="updatePost"></SinglePost>
    </li>
</ol>
</template>

<script setup>
import SinglePost from './SinglePost.vue';
import {ref} from 'vue';

const posts = ref([
    {id:1, title: 'Post 1'},
    {id:2, title: 'Post 2'},
    {id:3, title: 'Post 3'},
]);

const updatePost = (postId) => {
    posts.value = posts.value.map((post)=>{
        if(post.id ==postId) return {post, title:'Post is updated'};

        return post;
    });
}
</script>