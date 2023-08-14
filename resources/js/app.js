// import './bootstrap';

import { createApp } from 'vue';
import App from './src/App.vue';
import Router from '@/src/router'

createApp(App)
  .use(Router)
  .mount('#app');