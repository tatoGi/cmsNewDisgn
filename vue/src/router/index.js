import { createRouter, createWebHashHistory } from "vue-router";
import Dashboard from '../views/Dashboard.vue';
import Register from '../views/Register.vue';
import Login from '../views/Login.vue'

const routes = [
  {
    path: '/',
    name:'Dashboard',
    component:Dashboard

  },
  {
    path: '/login',
    name:'Login',
    component:Login

  },
  {
    path: '/register',
    name:'Register',
    component:Register

  }

];

const router = createRouter({
    
    history: createWebHashHistory(),
    routes
  })

  export default router;