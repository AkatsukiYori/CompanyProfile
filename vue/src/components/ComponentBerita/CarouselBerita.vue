<template>
  <div class="p-8 mb-12">
    <h1 class="text-4xl font-bold">Berita Trending</h1>
    <div class="flex">
        <carousel ref="carousel" :items-to-show="numOfElements" :items-to-scroll="1" class="pt-8 pb-12" :wrap-around="true" :breakpoints="breakpoints" :autoplay="5000">
            <slide @click="beritaDetails(berita.image,berita.title, berita.datetime, berita.description, berita.slug)" v-for="berita in carouselBerita" class="px-4" :key="berita.id">
                <div class="relative">
                    <img :src="berita.image" alt="" class="w-full">
                    <div class="p-4 absolute left-0 top-0 w-full h-full opacity-0 hover:opacity-100 transition-all duration-300">
                        <div class="relative w-full h-full">
                            <div class="absolute bottom-0 left-0">
                                <h1 class="font-bold text-white z-10 relative lg:text-3xl md:text-2xl sm:text-3xl xs:text-2xl text-left">{{berita.title}}</h1>
                                <p class="text-white z-10 relative lg:text-lg md:text-base sm:text-lg xs:text-lg text-left">{{berita.date}}</p>
                            </div>
                        </div>
                        <div class="bg-black z-0 opacity-50 w-full h-full absolute left-0 top-0"></div>
                    </div>
                </div>
            </slide>
        </carousel> 
    </div>
  </div>
</template>

<script>
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

export default {
    props: ['carouselBerita', 'numOfElements'],
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    methods: {
        beritaDetails(image, title, datetime, description, slug){
            this.$router.push({name: 'BeritaDetails', params: {slug, title, image, description, datetime}})
        }
    }
}
</script>