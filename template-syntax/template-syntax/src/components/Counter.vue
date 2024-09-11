<template>
 
    
    <div class="btn-block">
        <h3>{{title}}</h3>

        <button @click.prevent="decrementCounter()">-</button>
        <span>{{counter}}</span>
        <button @click.prevent="indcrementCounter()">+</button>
    </div>

    <!-- Data binding -->
    <input type="text" v-model="title">
    
</template>



<!-- ========================================== -->
<!-- Using Composition API -->
<!-- ========================================= -->

<script setup>

    import {ref} from 'vue';    //import
        
    const counter = ref(0);     // ref for reactive variable - imp. to import first

    //-- writing funtion is optional can also use const and write as below
    const decrementCounter =()=>{
        counter.value--;
    }

    const indcrementCounter =()=>{
        counter.value++;
    }

    // function decrementCounter(){
    //     counter.value--;
    // }

    // function indcrementCounter(){
    //     counter.value++;
    // }

    const title = ref('Counter Title');



    //--------------------------------------
    //  If do not use <script setup>
    //-----------------------------------------

    // export default{
    //     setup(){
    //         const counter = ref(0);

    //         function decrementCounter(){
    //             counter.value--;
    //         }

    //         function indcrementCounter(){
    //             counter.value++;
    //         }

    //         return{
    //             counter,
    //             decrementCounter,
    //             indcrementCounter
    //         };
    //     }
    // };

</script>

<style scoped>
  .btn-block{
    text-align: center;
  }
  button{
    margin: 5px;
  }
  h2{
    color: red;
    font-weight: bold;
  }
</style>