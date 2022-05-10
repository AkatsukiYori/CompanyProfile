import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './assets/tailwind.css'
import axios from 'axios'

axios.defaults.baseURL = process.env.NODE_ENV === 'production' ? 'https://kitaserbadigital.co.id/api' : 'http://localhost:8000/api'

const app = createApp(App).use(router).mount('#app')