<template>
<div ref="containerref">
  <h1 class="overflow-y-hidden pt-16 m-auto text-center text-white text-4xl">{{headertitle}}</h1>
  <carousel :items-to-show="3.3" :items-to-scroll="1" class="pt-32 pb-12" :wrap-around="true" :breakpoints="breakpoints" :autoplay="3000">
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
  props: ['contents', 'headertitle', 'color1', 'color2', 'color3'],
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
    changeCarouselBg(){
      this.$refs.containerref.style.background = 'linear-gradient(16deg, '+this.color1+' 0%, '+this.color2+' 65%, '+this.color3+' 100%)'
    }
  },
  mounted(){
    this.changeCarouselBg()
  },  
}
</script>

<style scoped>
*{
  overflow-x: hidden;
}
</style>