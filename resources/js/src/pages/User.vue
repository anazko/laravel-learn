<template>
  <div v-if="this.user" >
    <p>{{ user.id }}</p>
    <p>{{ user.name }}</p>
    <p>{{ user.email }}</p>
  </div>
  <div v-else>
    Loading...
  </div>
</template>

<script>
  import {mapActions, mapGetters, mapMutations} from 'vuex'

  export default {
    data() {
      return {
        title: "User"
      }
    },
    computed: {
      ...mapGetters('users', ['user'])
    },
    methods: {
      ...mapActions('users', ['fetchUser']),
      ...mapMutations('users', ['setUser'])
    },
    mounted() {
      this.setUser(null)
      this.fetchUser(this.$route.params.id)
    }
  }
</script>

<style lang="scss" scoped>
</style>