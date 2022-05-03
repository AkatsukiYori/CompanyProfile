<template>
  <div class="mb-8">
    <h1 class="p-8 text-4xl font-bold">Album Details</h1>
    <div class="px-8 bgimage fixed opacity-50 bottom-0 left-0 w-full h-full -z-10"></div>
    <div class="lg:flex md:flex">
        <div ref="iframeref" class="px-8 w-full sm:h-full mr-8 self-center sm:mb-8 xs:mb-8">
            <div ref="iframeref2" class="flex items-center w-full mb-4">
                <img ref="leftimage" src="" alt="Gambar" class="w-11/12 md:w-3/4 m-auto">
                <iframe ref="leftlink" src="" class="w-full h-60 md:w-3/4 m-auto"></iframe>
            </div>
            <p class="text-center text-3xl font-bold">{{ title }}</p>
            <p class="text-center text-lg mb-8">{{ description }}</p>
            <router-link :to="{ name: 'Album' }" style="background-color: #9333EA" class="w-full m-auto rounded-3xl bg-black h-8 text-white text-lg font-bold text-center">
                Back to home
            </router-link>
        </div>
        <div class="w-full lg:rounded-2xl md:rounded-2xl p-2 mr-8 sm:overflow-y-scroll xs:overflow-y-scroll sm:albumdetailclass xs:albumdetailclass pb-8" style="background: linear-gradient(15deg, #C56FE1 0%, #CB81F2 50%, #8F41F1 100%)">
            <p class="text-white lg:text-4xl md:text-3xl sm:text-2xl xs:text-xl font-bold text-center p-4">Album Content</p>
            <div class="flex flex-wrap items-center ease-in-out h-full md:overflow-hidden sm:h-auto">
                <div v-for="gambar in albumItems" :key="gambar.id" class="lg:w-1/3 xs:w-1/2">
                    <div class="lg:p-4 md:p-2 sm:p-2 xs:p-2 sm:w-full h-full" v-if="gambar.type == 'image'" @click="changeAlbumItem(gambar.src, gambar.type)" >
                        <img class="w-full" :src="gambar.src" alt="src" >
                    </div>
                    <div class="lg:p-4 md:p-2 sm:p-2 xs:p-2 md:w-full lg:w-full h-full" v-else-if="gambar.type == 'video'" @click="changeAlbumItem(gambar.src, gambar.type)" >
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
    props: ['albumItems', 'title', 'description'],
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    methods: {
        changeAlbumItem(newsrc, type){
            this.$refs.leftimage.style.display = "none"
            this.$refs.leftlink.style.display = "none"
            if(type=="image"){
                this.$refs.leftimage.src = newsrc
                this.$refs.leftimage.style.display = "block"
            }else if(type == "video"){
                this.$refs.leftlink.src = newsrc
                this.$refs.leftlink.style.display = "block"
            }
        },
        updateGalleryImage: function(){
            this.$refs.leftimage.style.display = "none"
            this.$refs.leftlink.style.display = "none"
            if(this.albumItems[0].type == "image"){
                this.$refs.leftimage.style.display = "block"
                this.$refs.leftimage.src = this.albumItems[0].src
            }else if(this.albumItems[0].type == "video"){
                this.$refs.leftlink.style.display = "block"
                this.$refs.leftlink.src = this.albumItems[0].src
            }
        }
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
@media (min-width: 640px){
    .sm\:albumdetailclass{
        height: 500px;
    }
}
@media (min-width: 360px){
    .sm\:albumdetailclass{
        height: 500px;
    }
}
</style>