<template>
 
    
    <div class="btn-block">
        <h3> Counter component</h3>

        <button @click.prevent="decrementCounter()">-</button>
        <span>{{counter}}</span>
        <button @click.prevent="indcrementCounter()">+</button>
    </div>
    
</template>

<!-- ========================================== -->
<!-- Using Option API -->
<!-- ========================================= -->
<script>
    export default{
        data(){
            return{
                counter : 0     //defined as variable
            };
        },

        methods:{
            decrementCounter(){
                this.counter--;
            },
            indcrementCounter(){
                this.counter++;
            }
        }
    };
</script>

<style>
  .btn-block{
    text-align: center;
  }
  button{
    margin: 5px;
  }
</style>