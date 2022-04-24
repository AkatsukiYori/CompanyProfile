<template>
<div>
  <h1 class="overflow-y-hidden pt-16 m-auto text-center text-white text-4xl  bg-purple-600">Products</h1>
  <carousel :items-to-show="3.3" :items-to-scroll="3" class="bg-purple-600 pt-32 pb-12" :wrap-around="true" :breakpoints="breakpoints">
    <slide v-for="slide in slides" :key="slide.id">
      <img :src="slide.image" alt="" class="w-9/12">
    </slide>

    <template #addons>
      <navigation class="mx-5"/>
      <pagination />
    </template>
  </carousel>
</div>
</template>

<script>
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

export default {
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },
  data(){
      return{
        slideGroups: 0,
        itemsPerRow: 3,
          slides: [
              {id: 1, title: 'test', image: require('../assets/logo.png')},
              {id: 2, title: 'test', image: require('../assets/logotest.jpg')},
              {id: 3, title: 'test', image: require('../assets/logo.png')},
              {id: 4, title: 'test', image: require('../assets/logotest.jpg')},
              {id: 5, title: 'test', image: require('../assets/logo.png')},
              {id: 6, title: 'test', image: require('../assets/logotest.jpg')},
              {id: 7, title: 'test', image: require('../assets/logo.png')},
              {id: 8, title: 'test', image: require('../assets/logotest.jpg')},
              {id: 9, title: 'test', image: require('../assets/logotest.jpg')},
          ],
          
      }
  },
  methods: {
    updateGroup(){
      this.slideGroups = this.slides.length / this.itemsPerRow
    }
  } 
}
</script>

<style scoped>
*{
  overflow-x: hidden;
}
</style>