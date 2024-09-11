<template>
#FormInput
<ol>
    <li>
        <input type="text" :value="inputValue" @input="(event)=>(inputValue =event.target.value)"/> &nbsp
        <input type="text" v-model="inputValue"/>   <!-- this does the same task--> 
        <div>{{inputValue}}</div>
    </li>
    <li>
        <textarea v-model="message" cols="30" rows="3"></textarea>
        <div style="white-space: pre-line">{{message}}</div>
    </li>
    <li>
        <div><input type="checkbox" v-model="checked"> {{checked}}</div>
    </li>
    <li>
        <input type="checkbox" v-model="CheckNames" value="Sunil1">&nbsp
        <input type="checkbox" v-model="CheckNames" value="Sunil2">&nbsp
        <input type="checkbox" v-model="CheckNames" value="Sunil3">&nbsp
        <div >{{CheckNames}}</div>
    </li>
    <li>
        <input type="radio" v-model="RadioNames" value="Yes">Yes &nbsp
        <input type="radio" v-model="RadioNames" value="No">NO &nbsp
        <div >{{RadioNames}}</div>
    </li>

    
</ol>
</template>

<script setup>
import {ref} from 'vue';
// 1st
const inputValue = ref('sunil');   

//2nd
const message = ref("textarea")

//3rd
const checked = ref(true);
//4th
const CheckNames = ref([]);
//5th
const RadioNames = ref([]);

</script>