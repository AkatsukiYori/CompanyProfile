<template>
<div>
  <h1 class="overflow-y-hidden pt-16 m-auto text-center text-white text-4xl  bg-purple-600">{{headertitle}}</h1>
  <carousel :items-to-show="3.3" :items-to-scroll="1" class="bg-purple-600 pt-32 pb-12" :wrap-around="true" :breakpoints="breakpoints" :autoplay="3000">
    <slide v-for="content in contents" :key="content.id">
      <img :src="content.image" alt="" class="w-9/12">
    </slide>

    <template #addons>
      <navigation class="mx-5 mt-6"/>
      <pagination />
    </template>
  </carousel>
</div>
</template>

<script>
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

export default {
  props: ['contents', 'headertitle'],
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },
  data(){
      return{
          
          
      }
  },
  methods: {
  } 
}
</script>

<style scoped>
*{
  overflow-x: hidden;
}
</style>