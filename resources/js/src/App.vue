<template lang="">
  <div>
    <Header />
    <div class="container mx-auto">
      <router-view />
    </div>
  </div>
</template>

<script>
import Header from './components/Header.vue'

 export default {
  components: {
    Header
  },
  data() {
    return {
      title: "Admin SPA"
    }
  }
}

</script>

<style lang="">
  
</style>