import { createRouter, createWebHistory } from 'vue-router';

import Dashboard from '@/pages/Dashboard.vue';
import Users from '@/pages/Users.vue';
import User from '@/pages/User.vue';
import Posts from '@/pages/Posts.vue';

export const routes = [
  {
    path: '/',
    component: Dashboard,
    name: 'dashboard'
  },
  { 
    path: '/users', 
    component: Users, 
    name: 'users' 
  },
  { 
    path: '/users/:id', 
    component: User, 
    name: 'user' 
  },
  { 
    path: '/posts', 
    component: Posts, 
    name: 'posts' 
  }
];

const router = createRouter({
  history: createWebHistory('/admin'),
  linkActiveClass: 'active',
  routes
});

export default router;
