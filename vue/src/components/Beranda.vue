<template>
<div>
    <carousel ref="carousel" class="w-full flex flex-wrap relative py-6" :items-to-show="1" :items-to-scroll="1" :wrap-around="true" :breakpoints="breakpoints" :autoplay="5000" :style="'background: linear-gradient(16deg, #bf00fe 0%, #7658f4 100%)'">
        <slide v-for="content in contents" class="flex flex-wrap" :key="content.id">
            <div class="lg:w-6/12 md:w-2/6 sm:w-full">
                <img :src="content.image" class="m-auto lg:w-10/12 md:w-full sm:w-2/3" alt="Gambar">
            </div>
            <div class="lg:w-6/12 md:w-4/6 p-4">
                <div class="lg:pr-4">
                    <p class="sm:text-4xl sm:text-center md:text-3xl text-white lg:text-left sm:font-semibold font-bold lg:text-5xl xs:text-3xl xs:mb-6 sm:mb-6 md:mb-8 lg:mb-12">{{content.title}}</p>
                    <p class="sm:text-justify text-white lg:text-left text-sm">{{content.description}}</p>
                </div>
            </div>
        </slide>
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
    },
  },
  mounted(){
    this.changeCarouselBg()
  },  
}
</script>