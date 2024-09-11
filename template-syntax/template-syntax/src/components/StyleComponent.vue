<template>
#styleComponent
<ol>
    <li><h3 :style="{color: Activecolor, 'font-size': fontSize}">Applyign Styles</h3></li>
    <li><h3 :style="styleObject">Applyign Styles - Using Style Object</h3></li>
    <li><h3 :style="ComputedstyleObject">Applyign Styles - Using Style Computed</h3></li>
    <li><h3 :style="[baseStyle, baseStyle2]">Applyign Styles - multiple styles</h3></li>
</ol>
</template>

<script setup>
    import {ref, reactive, computed} from 'vue';

    // 1st way
    const Activecolor = ref('red');
    const fontSize = ref('28px');

    //2nd Way
    const styleObject = reactive({
        color: 'green',
        fontSize: '30px',
        fontWeight: 'bold',
    });

    //3rd way
    const ComputedstyleObject = computed(()=>{
        return{
            color: Activecolor.value,
            fontSize: fontSize.value,
            fontWeight: 'bold'
        };
    });

    setTimeout(()=>{
        Activecolor.value = 'yellow';
    },5000);

    // 4th 

    const baseStyle = reactive({
        color: "orange",                 //This color will not apply.
        fontSize: '24px'
    });

    const baseStyle2 = reactive({
        color: "skyblue",               //This color will apply as it came later
        fontSize: '24px'
    });

</script>