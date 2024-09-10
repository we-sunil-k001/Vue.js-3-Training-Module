<template>
#WatchComponent
<ol>
    <li>
        <p>
            Ask a yes/no question:
            <input v-model="question" :disabled="loading" />
        </p>
        <p>{{ answer }}</p>
    </li>

    <li>
        <div> X: <input type="text" v-model="x" ></div>
    </li>

    <li>
        <div> Y: <input type="text" v-model="y" ></div>
    </li>
</ol>
  

</template>

<script setup>
import { ref, watch } from 'vue'

const question = ref('')
const answer = ref('Questions usually contain a question mark. ;-)')
const loading = ref(false)

// watch works directly on a ref
watch(question, async (newQuestion, oldQuestion) => {
  if (newQuestion.includes('?')) {
    loading.value = true
    answer.value = 'Thinking...'
    try {
      const res = await fetch('https://yesno.wtf/api')
      answer.value = (await res.json()).answer
    } catch (error) {
      answer.value = 'Error! Could not reach the API. ' + error
    } finally {
      loading.value = false
    }
  }
})

//2nd - Watcher Source Types like Ref, Getter and array
const x = ref(0)
const y = ref(0)

// single ref
watch(x, (newX) => {
  console.log(`x is ${newX}`)
})

watch([x, y], ([newX, newY])=>{
      console.log(`value of X and Y ${newX} and  ${newX}`);
});

// getter
watch(
  () => x.value + y.value,
  (sum) => {
    console.log(`sum of x + y is: ${sum}`)
  }
)
</script>
