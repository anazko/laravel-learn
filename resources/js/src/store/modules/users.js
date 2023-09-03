
  export const apiHost = import.meta.env.VITE_APP_API_URL
  
  const state = () => {
    return {
      users: null,
      user: null
    }
  }

  const getters = {
    users(state) {
      return state.users
    },
    user(state) {
      return state.user
    }
  }

  const mutations = {
    setUsers(state, data) {
      state.users = data
    },
    setUser(state, data) {
      state.user = data
    }
  }

  const actions = {
    async fetchUsers(context) {
      try {
        const response = await fetch(`${apiHost}/api/users`)
        const json = await response.json()
        context.commit('setUsers', json.data)
      } catch (error) {
        console.log(error)
      }
    },

    async fetchUser(context, userId) {
      try {
        const response = await fetch(`${apiHost}/api/users/${userId}`)
        const json = await response.json()
        context.commit('setUser', json.data)
      } catch (error) {
        console.log(error)
      }
    }
  }

  export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
  }
