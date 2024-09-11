
<template>
 <counter></counter>
  <hr>
  <TemplateSyntax></TemplateSyntax>
  <hr>
  <ComputedComp></ComputedComp>
  <hr>
  <ClassComp></ClassComp>
  <hr>
  <StyleComp></StyleComp>
  <hr>
  <ConditionalComp></ConditionalComp>
  <hr>
  <ListRenderingComp></ListRenderingComp>
  <hr>
  <EventHandlingComp></EventHandlingComp>
  <hr>
  <FormInputComp></FormInputComp>
  <hr>
  <WatchComponent></WatchComponent>
  <hr>
  <!-- <SlotComponent>
    <span>Hello</span>
    <span style="color: red">{{name}}</span>
  </SlotComponent> -->
  <slotComponent/>
  <hr>
</template>
    
<style>
hr{
  margin: 20px 0px;
}
</style>

<script setup>
import {ref} from 'vue';
const name = ref(' Sunil');  
</script>
