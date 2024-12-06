<template>
    <div>
        <h2>Profile Name: {{ $route.params.name }}</h2>
    </div>
</template>

<!--  
In Vue's Options API, the $route object is globally available, so you don't need to explicitly import useRoute from Vue Router 
when accessing route parameters in the template.

Your code with {{ $route.params.name }} is sufficient to display the name parameter in the template, and you don’t need the 
<script setup> block or useRoute in this case.

    <script setup>
    import { useRoute } from 'vue-router'

    const route = useRoute();
    const name = route.params.name;
    </script>

-->