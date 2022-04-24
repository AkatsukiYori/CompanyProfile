<template>
    <div>
        <p class="text-purple-700 text-4xl font-semibold pt-7 flex justify-center">Galeri</p>
        <div class="flex flex-wrap">
            <div class="lg:w-1/2 md:w-full sm:w-full p-8">
                <img src="../assets/laptop.png" alt="Gambar" class="w-11/12">
            </div>
            <div class="flex flex-wrap w-1/2">

                <div class="lg:w-4/12 md:w-1/2 sm:w-full h-1/3 p-4 hover:gray" v-for="image in images.slice(0,9)" :key="image.id">
                    <div v-if="image.id <= 8">
                        <img :src="require(`@/assets/${image.imageName}`)" alt="Gambar" class="">
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
    data(){
        return{
            images: [
                {id: 1, imageName: "laptop.png"},
                {id: 2, imageName: "laptop.png"},
                {id: 3, imageName: "laptop.png"},
                {id: 4, imageName: "laptop.png"},
                {id: 5, imageName: "laptop.png"},
                {id: 6, imageName: "laptop.png"},
                {id: 7, imageName: "laptop.png"},
                {id: 8, imageName: "laptop.png"},
                {id: 9, imageName: "laptop.png"},
            ]
        }
    }
}
</script>

<style>

</style>