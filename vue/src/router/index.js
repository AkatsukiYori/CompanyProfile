import { createRouter, createWebHistory } from 'vue-router'
import AlbumDetails from '../views/AlbumDetails.vue'
import Album from '../views/Album.vue'
import Berita from '../views/Berita.vue'
import Landing from '../views/Landing.vue';
import NotFound from '../views/NotFound.vue';
import OurTeam from '../views/OurTeam.vue';

const routes = [
  {
    path: '/:catchAll(.*)',
    name: 'NotFound',
    component: NotFound
  },
  {
    path: '/',
    name: 'Landing',
    component: Landing
  },
  {
    path: '/album/:title',
    name: 'AlbumDetails',
    component: AlbumDetails,
    params: true
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
  },
  {
    path: '/ourteam',
    name: 'OurTeam',
    component: OurTeam
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router