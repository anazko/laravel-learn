import { createRouter, createWebHistory } from "vue-router"

import Dashboard from "@/pages/Dashboard.vue"
import Users from "@/pages/Users.vue"
import Posts from "@/pages/Posts.vue"

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