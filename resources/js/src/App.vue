<template lang="">
  <div>
    <Header />
    <div class="content container">
      <router-view />
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue';
import Header from './components/Header.vue'
 
export default defineComponent({
  components: {
    Header
  },
  setup() {
    return {
      text: "Hi vue!"
    }
  }
});

</script>

<style lang="">
  
</style>