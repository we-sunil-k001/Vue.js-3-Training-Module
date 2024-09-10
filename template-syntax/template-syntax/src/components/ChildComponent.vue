<template>
#Child Component
<ol>
    <li>
        <div>
            <p>Hello from Child Component!!!</p>
        </div>
    </li>
    <li>
        title reveived from parent comp.: {{title}}
    </li>
    <li>
        ID reveived from parent comp.: {{id}}
    </li>

</ol>
 
</template>

<script setup>
// get data from another component
// 1st way
// const props = defineProps(['title']);

//2nd way
const props = defineProps({
    title: String,
    id: Number
});

console.log(props.title);
</script>
