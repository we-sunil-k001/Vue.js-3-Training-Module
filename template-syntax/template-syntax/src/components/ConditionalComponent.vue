<template>
#Condtional Component - v-if

<ol>
    <li><div v-if="awesome">Vue is awesome!</div></li>
    <li><div v-if="!awesome">Vue is Boring!!</div></li>   <!--This won't display any thing -->

    <li>
        <button @click="$event => isAwesome = !isAwesome">Toggle</button>
        <div v-if="isAwesome">Vue is Awsome!!</div>
        <div v-else>Vue is Boring!!</div>
    </li> 

    <li>
        <div v-if="num == 0">0</div>
        <div v-else-if="num == 1">1</div>
        <div v-else-if="num == 2">2</div>
        <div v-else-if="num == 3">3</div>
        <div v-else-if="num == 4">4</div>
        <div v-else>No. ends here..</div>
    </li> 
</ol>
</template>

<script setup>
import {ref} from 'vue';

// 1st and 2nd
const awesome = ref(true);
//3rd
const isAwesome = ref(true);
// 4th
const num = ref(0);
setInterval(()=>{
    num.value++;
},3000);

</script>

