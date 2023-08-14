import Dashboard from "@/src/pages/Dashboard.vue"
import Users from "@/src/pages/Users.vue"
import Posts from "@/src/pages/Posts.vue"
import { createRouter, createWebHistory } from "vue-router"

export const routes = [
  { path: '/', component: Dashboard },
  { path: '/users', component: Users },
  { path: '/posts', component: Posts },
]

const router = createRouter({
  history: createWebHistory('/admin'),
  linkActiveClass: 'active',
  routes
})

export default router


