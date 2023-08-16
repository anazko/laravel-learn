<template>
  <div v-if="this.users">
    <ul class="list" >
      <li v-for="user in users" class="item">
        <RouterLink :to="{ name: 'user', params: {id: user.id} }">
          {{ user.name }}
        </RouterLink>
      </li>
    </ul>
  </div>
  <div v-else>
    List is empty
  </div>
</template>

<script>
  import { mapActions, mapGetters } from 'vuex'

  export default {
    data() {
      return {
        title: "Users"
      }
    },
    computed: {
      ...mapGetters('users', ['users'])
    },
    methods: {
      ...mapActions('users', ['fetchUsers']) 
    },
    created() {
      this.fetchUsers()
    }
  }
</script>

<style lang="scss" scoped>
  .list {
    list-style: none;
  }
</style>