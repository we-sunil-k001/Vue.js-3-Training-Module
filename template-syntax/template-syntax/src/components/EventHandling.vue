<template>
#EventHandlingComp

<ol>
    <li>
        <button v-on:click="count++">"v-on" Click event</button> &nbsp
        <button @click="increamentCounter"> Click event</button> &nbsp
        <button @click="increamentCounter('sunil')"> Click event</button>
        <div>Counter : {{count}}</div>
    </li>
    <li>
        <a href="http://google.com" @click="onLinkClick">Link click event</a><br>

        <div @click.capture="onParentClick">
            <a href="http://google.com" @click.stop.prevent="onLinkClick">Link click event</a>
        </div>
    </li>
</ol>
</template>

<script setup>
    import {ref} from 'vue';

    const count = ref(1);

    const increamentCounter = (name)=>{
        count.value++;
        console.log(name);      // can see the event 
        console.log(event.target.tagName);      // can see the event 
    }

    //2nd ========================
    const onLinkClick = (event)=>{
        event.preventDefault();
        console.log("Link clicked");
    }

    const onParentClick =()=>{
            console.log("Parent Link clicked");
    }

</script>

