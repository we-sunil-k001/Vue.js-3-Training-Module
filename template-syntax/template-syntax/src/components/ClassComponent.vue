<template>
#Class component
<ol>
    <li> <h3 :class="{ 'mytitle': isActive, 'text-danger':someVariable }"> way - Hello this is Class component - using ref</h3></li>
    <li> <h3 :class="classObject"> way - Class component using reactive-object</h3></li>
    <li> <h3 :class="computedClassObj"> way - Class component using computed</h3></li>
    <li> <h3 :class="['mytitle',{'text-danger': someVariable}]"> way - Class component using Array</h3></li>

    <li>
        <!-- Binding Multiple Classes (Static + Dynamic) -->
        <h3 class="mytitle" :class="{ active: isActive, disabled: !isActive }">
            Hello, this is class binding with static and dynamic classes
        </h3>
    </li>
    <li>There few more ways...</li>
</ol>
    
</template>

<script setup>
    import {reactive, ref, computed} from 'vue';

    // 1st way
    const isActive = ref(true);
    const someVariable = ref(false);


    // 2nd way 
    const classObject = reactive({
         'mytitle': true, 
         'text-danger':true 
         });


    // 3rd way
    const computedClassObj = computed(()=>{
        return {
            'mytitle': isActive.value && someVariable.value,        // checks variable True or false for both the variable
            'text-danger': isActive.value                           // check for isActive variable only
        }
    });
    
</script>