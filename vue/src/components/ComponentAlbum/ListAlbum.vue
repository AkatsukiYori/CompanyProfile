<template>
  <div class="p-8">
    <div class="flex justify-between">
        <h1 class="text-4xl font-bold pb-8">List Album</h1>
        <div class="flex items-center self-start">
            <input class="rounded-3xl border-2 mr-2 bg-transparent focus:border-purple-600 focus:border-2 border-purple-600 px-4" type="text" placeholder="Search Album">
            <img src="@/assets/magnifying.png" alt="" class="w-8 h-8">
        </div>
    </div>
    <div class="bgimage fixed opacity-50 bottom-0 left-0 w-full h-full -z-10"></div>
    <div>
        <div v-for="row in listRowAlbum" :key="row.id" class="flex w-full mb-16">
            <div v-for="album in row.listAlbum" :key="album.id" class="px-8" @click="albumDetails(album.id)">
                <p class="text-center text-xl font-bold">{{album.title}}</p>
                <img :src="album.image" alt="">
                <p class="text-center text-lg">{{album.date}}</p>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

export default {
    props: ['listRowAlbum'],
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    methods: {
        albumDetails(id){
            console.log(id)
            this.$router.push('/albumDetails');
        }
    }
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