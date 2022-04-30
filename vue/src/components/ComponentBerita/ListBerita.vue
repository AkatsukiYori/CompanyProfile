<template>
  <div class="p-8 mb-12">
    <h1 class="text-4xl font-bold">List Berita</h1>
    <div class="bgimage fixed opacity-50 bottom-0 left-0 w-full h-full -z-10"></div>
    <div>
        <div class="lg:flex md:flex w-full mb-8" v-for="berita in listBerita" :key="berita.id">
            <div class="lg:w-5/12 md:w-6/12 lg:mr-16 md:mr-8 sm:w-full sm:mr-8 xs:w-full xs:mr-8 flex justify-center">
                <img :src="berita.image" alt="">
            </div>
            <div class="lg:w-7/12 md:w-6/12 sm:w-full xs:w-full">
                <div class="flex">
                    <div class="kategori" v-for="category in berita.categories" :key="category.id">{{category}}</div>
                </div>
                <div>
                    <p class="text-black lg:text-xl md:text-xl pb-2 sm:text-sm">{{berita.datetime}}</p>
                    <p class="text-black font-bold lg:text-3xl md:text-2xl sm:text-3xl xs:text-3xl pb-2">{{berita.title}}</p>
                    <p class="text-black lg:text-lg md:text-lg">{{berita.description}}</p>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

export default {
    props: ['listBerita'],
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
}
</script>

<style scoped>
.bgimage{
    background-image: url('@/assets/beritabg.png');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}
.kategori{
    background: linear-gradient(240deg, #C56FE1 0%, #CB81F2 15%, #8F41F1 100%);
    border-radius: 12px;
    color: white;
    padding: 4px 12px;
    height: 40px;
    margin: 0 12px 24px 0;
    text-align: center;
}
</style>