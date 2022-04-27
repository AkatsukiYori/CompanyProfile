<template>
<div>
    <carousel ref="carousel" class="w-full flex flex-wrap relative" :items-to-show="1" :items-to-scroll="1" :wrap-around="true" :breakpoints="breakpoints" :autoplay="5000" :style="'background: linear-gradient(16deg, #bf00fe 0%, #7658f4 100%)'">
        <slide v-for="content in contents" :key="content.id">
            <div class="w-6/12">
                <img :src="content.image" class="m-auto w-10/12" alt="Gambar">
            </div>
            <div class="w-6/12">
                <div class="pr-12">
                    <p class="text-white text-left font-bold text-5xl mb-12">{{content.title}}</p>
                    <p class="text-white text-left text-sm">{{content.description}}</p>
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