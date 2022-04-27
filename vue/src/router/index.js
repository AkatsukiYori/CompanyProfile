import { createRouter, createWebHistory } from 'vue-router'
import Album from '../views/Album.vue'
import Berita from '../views/Berita.vue'
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
  },
  {
    path: '/berita',
    name: 'Berita',
    component: Berita
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
