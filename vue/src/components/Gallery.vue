<template>
    <div>
        <p class="text-purple-700 text-4xl font-semibold pt-7 flex justify-center">Galeri</p>
        <div class="flex flex-wrap">
            <div class="lg:w-1/2 md:w-full sm:w-full p-8">
                <img ref="leftimage" src="" alt="Gambar" class="w-11/12">
                <video ref="leftvideo" src="" controls></video>
                <iframe ref="leftlink" src=""></iframe>
            </div>
            <div class="flex flex-wrap w-1/2">
                <div class="lg:w-4/12 md:w-1/2 sm:w-full h-1/3 p-4 hover:gray" v-for="galleryitem in galleryitems.slice(0,9)" :key="galleryitem.id">
                    <div v-if="galleryitem.type == 'image'">
                        <img @click="changeGalleryItem(galleryitem.src, galleryitem.type)" :src="galleryitem.src" alt="src" class="">
                    </div>
                    <div v-else-if="galleryitem.type == 'video'">
                        <video @click="changeGalleryItem(galleryitem.src, galleryitem.type)" width="320" height="240">
                            <source :src="galleryitem.src+'#t=0.1'" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div v-else-if="galleryitem.type == 'link'">
                        <img @click="changeGalleryItem(galleryitem.src, galleryitem.type)" :src="galleryitem.src" max-width="100%" style="border:0;" showinfo=0 controls=0 autohide=1>
                    </div>
                    <div class="h-full text-white" v-else>
                        <div class="w-10/12 h-full flex items-center justify-center rounded-xl" style="background: linear-gradient(to left bottom, #BF00FE, #444)">
                            More >>
                        </div>
                    </div>
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
            this.$refs.leftimage.src = this.galleryitems[0].src
            this.$refs.leftvideo.style.display = "none"
        }
    },
    mounted(){
        this.updateGalleryImage()
    },  
}
</script>

<style>

</style>