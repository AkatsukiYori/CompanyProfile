<template>

    <div>
        <p class="text-purple-700 text-4xl font-semibold pt-7 flex justify-center">Galeri</p>
        <div class="flex flex-wrap my-8">
            <div class="lg:w-1/2 md:w-4/6 sm:w-full p-8 md:flex md:flex-wrap md:justify-center">
                <div class="flex items-center w-full h-full">
                    <img ref="leftimage" src="" alt="Gambar" class="w-11/12 md:w-3/4 m-auto">
                    <video ref="leftvideo" src="" controls class="w-11/12 md:w-3/4 m-auto">
                    </video>
                    <iframe ref="leftlink" src="" class="w-full h-4/6 md:w-3/4 m-auto"></iframe>
                </div>
            </div>
            <div class="flex md:flex-wrap lg:w-1/2 md:w-2/6 xs:overflow-x-scroll md:overflow-hidden">
                <div class="lg:w-1/3 md:w-1/2 md:flex md:flex-wrap hover:border-4 transition-all duration-100 hover:cursor-pointer border-purple-600" v-for="galleryitem in galleryitems.slice(0,8)" :key="galleryitem.id" ref="galleryitem" @click="changeActive(galleryitem.id)">
                    <div class="p-4 rounded-lg xs:w-20 sm:w-full flex flex-wrap items-center ease-in-out" v-if="galleryitem.type == 'image'" @click="changeGalleryItem(galleryitem.src, galleryitem.type)" >
                        <img class="w-full" :src="galleryitem.src" alt="src" >
                    </div>
                    <div class="p-4 rounded-lg xs:w-20 md:w-full lg:w-full flex flex-wrap items-center ease-in-out" v-else-if="galleryitem.type == 'video'" @click="changeGalleryItem(galleryitem.src, galleryitem.type)" >
                        <img class="w-full" :src="'http://img.youtube.com/vi/'+galleryitem.videoid+'/default.jpg'" alt="">
                    </div>
                </div>
                <div class="lg:w-1/3 md:w-1/2 p-2 xs:flex xs:justify-center md:flex md:flex-wrap items-center  duration-100 hover:cursor-pointer hover:opacity-80 ease-in-out md:text-sm">
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
    props: ['galleryitems'],
    data(){
        return{
        }
    },
    methods: {
        changeGalleryItem(newsrc, type){
            if(type=="image"){
                this.$refs.leftimage.src = newsrc
                this.$refs.leftimage.style.display = "block"
                this.$refs.leftlink.style.display = "none"
            }else if(type=="video"){
                this.$refs.leftlink.src = newsrc
                this.$refs.leftimage.style.display = "none"
                this.$refs.leftlink.style.display = "none"
            }
        },
        updateGalleryImage: function(){
            this.$refs.leftimage.src = this.galleryitems[0].src
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
</style>