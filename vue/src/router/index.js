import { createRouter, createWebHistory } from 'vue-router'
import Album from '../views/Album.vue'
import Landing from '../views/Landing.vue';

const routes = [
  {
    path: '/',
    name: 'Landing',
    component: Landing
  },
  {
    path: '/album',
    name: 'Album',
    component: Album
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
