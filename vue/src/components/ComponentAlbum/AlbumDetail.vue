<template>
  <div class="p-8">
    <h1 class="text-4xl font-bold pb-8">Album Details</h1>
    <div class="bgimage fixed opacity-50 bottom-0 left-0 w-full h-full -z-10"></div>
    <div class="flex">
        <div class="w-5/12 mr-8 self-center">
            <div class="flex items-center w-full mb-4">
                <img ref="leftimage" src="" alt="Gambar" class="w-11/12 md:w-3/4 m-auto">
                <video ref="leftvideo" src="" controls class="w-11/12 md:w-3/4 m-auto">
                </video>
                <iframe ref="leftlink" src="" class="w-full h-4/6 md:w-3/4 m-auto"></iframe>
            </div>
            <p class="text-center text-3xl font-bold">{{listAlbum[0].title}}</p>
            <p class="text-center text-lg mb-8">{{listAlbum[0].description}}</p>
            <router-link :to="{ name: 'Album' }" style="background-color: #9333EA" class="w-full m-auto rounded-3xl bg-black h-8 text-white text-lg font-bold text-center">
                Back to home
            </router-link>
        </div>
        <div class="w-7/12 rounded-2xl" style="background: linear-gradient(15deg, #C56FE1 0%, #CB81F2 50%, #8F41F1 100%)">
            <p class="text-white text-4xl font-bold text-center p-4">Lorem Ipsum</p>
            <div v-for="album in listAlbum" :key="album.id" class="flex">
                <div v-for="gambar in album.listGambar" :key="gambar.id" class="w-full">
                    <div class="p-4 xs:w-20 sm:w-full flex flex-wrap items-center ease-in-out" v-if="gambar.type == 'image'" @click="changeAlbumItem(gambar.src, gambar.type)" >
                        <img class="w-full" :src="gambar.src" alt="src" >
                    </div>
                    <div class="p-4 xs:w-20 md:w-full lg:w-full flex flex-wrap items-center ease-in-out" v-else-if="gambar.type == 'video'" @click="changeAlbumItem(gambar.src, gambar.type)" >
                        <video width="320" height="240">
                            <source :src="gambar.src" type="video/mp4">
                        </video>
                    </div>
                    <div class="p-4 xs:w-20 md:w-full lg:w-full flex flex-wrap items-center ease-in-out" v-else-if="gambar.type == 'link'" @click="changeAlbumItem(gambar.src, gambar.type)" >
                        <img class="w-full" :src="'http://img.youtube.com/vi/'+gambar.videoid+'/default.jpg'" alt="">
                    </div>
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
    props: ['listAlbum'],
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    methods: {
        changeAlbumItem(newsrc, type){
            if(type=="image"){
                this.$refs.leftimage.src = newsrc
                this.$refs.leftimage.style.display = "block"
                this.$refs.leftvideo.style.display = "none"
                this.$refs.leftlink.style.display = "none"
            }else if(type=="video"){
                this.$refs.leftvideo.src = newsrc
                this.$refs.leftimage.style.display = "none"
                this.$refs.leftvideo.style.display = "block"
                this.$refs.leftlink.style.display = "none"
            }else{
                this.$refs.leftlink.src = newsrc
                this.$refs.leftimage.style.display = "none"
                this.$refs.leftvideo.style.display = "none"
                this.$refs.leftlink.style.display = "block"
            }
        },
        updateGalleryImage: function(){
            this.$refs.leftimage.style.display = "none"
            this.$refs.leftvideo.style.display = "none"
            this.$refs.leftlink.style.display = "none"
            if(this.listAlbum[0].listGambar[0].type == "image"){
                this.$refs.leftimage.style.display = "block"
                this.$refs.leftimage.src = this.listAlbum[0].listGambar[0].src
            }else if(this.listAlbum[0].listGambar[0].type == "video"){
                this.$refs.leftvideo.style.display = "block"
                this.$refs.leftvideo.src = this.listAlbum[0].listGambar[0].src
            }else{
                this.$refs.leftlink.style.display = "block"
                this.$refs.leftlink.src = this.listAlbum[0].listGambar[0].src
            }
        },
    },
    mounted(){
        this.updateGalleryImage()
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