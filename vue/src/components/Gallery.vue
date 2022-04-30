<template>
    <div>
        <p class="text-purple-700 text-4xl font-semibold pt-7 flex justify-center">Galeri</p>
        <div class="flex flex-wrap my-8 justify-center items-center">
            <div ref="iframeref" class="lg:w-1/2 md:w-3/6 sm:w-full sm:h-full p-8 md:flex md:flex-wrap md:justify-center">
                <div ref="iframeref2" class="flex items-center w-full h-full">
                    <img ref="leftimage" src="" alt="Gambar" class="w-11/12 md:w-3/4 m-auto">
                    <video ref="leftvideo" src="" controls class="w-11/12 md:w-3/4 m-auto md:h-full">
                    </video>
                    <iframe ref="leftlink" src="" class="w-full h-full md:w-full m-auto"></iframe>
                </div>
            </div>
            <div class="flex md:flex-wrap lg:w-1/2 md:w-1/2 xs:w-full xs:overflow-x-scroll md:overflow-hidden sm:h-auto">
                <div class="w-1/3 md:flex md:flex-wrap hover:border-4 transition-all duration-100 hover:cursor-pointer border-purple-600" v-for="galleryitem in galleryitems.slice(0,8)" :key="galleryitem.id" ref="galleryitem" @click="changeActive(galleryitem.id)">
                    <div class="lg:p-4 md:p-2 sm:p-2 xs:p-2 rounded-lg xs:w-32 sm:w-32 flex flex-wrap items-center ease-in-out items-center h-full lg:w-full" v-if="galleryitem.type == 'image'" @click="changeGalleryItem(galleryitem.src, galleryitem.type)" >
                        <img class="w-full" :src="galleryitem.src" alt="src" >
                    </div>
                    <div class="lg:p-4 md:p-2 sm:p-2 xs:p-2 rounded-lg xs:w-32 sm:w-32 md:w-full lg:w-full flex flex-wrap items-center ease-in-out items-center h-full" v-else-if="galleryitem.type == 'video'" @click="changeGalleryItem(galleryitem.src, galleryitem.type)" >
                        <video width="320" height="240" class="">
                            <source :src="galleryitem.src" type="video/mp4">
                        </video>
                    </div>
                    <div class="lg:p-4 md:p-2 sm:p-2 xs:p-2 rounded-lg xs:w-32 sm:w-32 md:w-full lg:w-full flex flex-wrap items-center ease-in-out items-center h-full" v-else-if="galleryitem.type == 'link'" @click="changeGalleryItem(galleryitem.src, galleryitem.type)" >
                        <img class="w-full" :src="'http://img.youtube.com/vi/'+galleryitem.videoid+'/default.jpg'" alt="">
                    </div>
                </div>
                <div class="w-1/3 p-2 xs:flex xs:justify-center md:flex md:flex-wrap items-center duration-100 hover:cursor-pointer hover:opacity-80 ease-in-out md:text-sm">
                    <router-link :to="{ name: 'Album' }" class="py-4 md:text-sm lg:text-lg text-white md:w-3/4 xs:w-20 h-full xs:text-xs flex items-center justify-center rounded-xl" style="background: linear-gradient(to left bottom, #ac7df1, #777)">
                        More >>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['galleryItems'],
    data(){
        return{
        }
    },
    methods: {
        changeGalleryItem(newsrc, type){
            this.$refs.leftimage.style.display = "none"
            this.$refs.leftvideo.style.display = "none"
            this.$refs.leftlink.style.display = "none"
            this.$refs.iframeref.style.height = "auto"
            this.$refs.iframeref2.style.height = "100%"
            if(type=="image"){
                this.$refs.leftimage.src = newsrc
                this.$refs.leftimage.style.display = "block"
            }else if(type=="video"){
                this.$refs.leftvideo.src = newsrc
                this.$refs.leftvideo.style.display = "block"
            }else{
                this.$refs.leftlink.src = newsrc
                this.$refs.leftlink.style.display = "block"
                this.$refs.iframeref.style.height = "500px"
                this.$refs.iframeref2.style.height = "100%"
            }
        },
        updateGalleryImage: function(){
            this.$refs.leftimage.style.display = "none"
            this.$refs.leftvideo.style.display = "none"
            this.$refs.leftlink.style.display = "none"
            if(this.galleryitems[0].type == "image"){
                this.$refs.leftimage.style.display = "block"
                this.$refs.leftimage.src = this.galleryitems[0].src
            }else if(this.galleryitems[0].type == "video"){
                this.$refs.leftvideo.style.display = "block"
                this.$refs.leftvideo.src = this.galleryitems[0].src
            }else{
                this.$refs.leftlink.style.display = "block"
                this.$refs.leftlink.src = this.galleryitems[0].src
            }
        },
        changeActive(index){
            for(let x=0; x<8; x++){
                this.$refs.galleryitem[x].classList.remove('activeGallery');
            }
            this.$refs.galleryitem[index-1].classList.add('activeGallery')
        }
    },
    mounted(){
        this.updateGalleryImage()
    },
}
</script>

<style scoped>
.activeGallery{
    border: 3px solid #9333EA;
}

@media (min-width: 640px){
    .sm\:gallerysm{
        height: 900px;
    }
}
</style>