<template>
    <ol>
        <li>{{message}}</li>
        <li v-html="html_content"></li>
        
        <li v-bind:id="dynamic_id">ID</li>

        <li :id="dynamic_id">Shorthand notation</li>    <!--Short hand Notation -->
        
        <li v-bind="obj">object</li>

        <li>{{2+2}}</li>
        
        <li>{{message ? 'Yes':'No'}}</li>

        <!-- <li>{{window.print()}}</li>       //these kind js properties won't work here -->
         
        <!-- <li>{{window.alert('helllo')}}</li>     //these kind js properties won't work here -->
        
        <li :[title]="title_value">Title</li>       <!-- create dynamic attribute -->

        <li><button v-on:click="alertme()">click me using v-on:click</button></li>
        <li><button @click="alertme()">click me unsing @click</button></li>
        <li><button @[dynamic_event]="alertme()">click me- Dynamic event</button></li>


    </ol>
</template>

<script setup>
    const message = 'hello world!!';    // normal text
    const html_content = '<h2> Hello HTML </h2>';   // HTML content
    const dynamic_id = 'myID';  // Dynamic ID

    const obj = {
        id: dynamic_id,       //id: 'listID',
        class: 'container'
    };

    const title = 'title';
    const title_value = 'this is a title';

    function alertme()
    {
        alert("hello alert");
    }

    const dynamic_event = "mouseover";
</script>

<style>
#app{
    display: block;
    margin: 0px!important;
}
    #myID{
        color: red;
        font-weight: 600;
    }
</style>