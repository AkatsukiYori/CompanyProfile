<template>
  <div class="p-8 mb-12">
    <div class="flex flex-wrap justify-between">
        <h1 class="text-4xl font-bold pb-8 md:w-1/3 sm:w-1/2 xs:w-full">Berita Terkini</h1>
        <div class="flex items-center self-start pb-8 md:w-1/3 sm:w-1/2 xs:w-full">
            <input class="rounded-3xl border-2 xs:w-full md:w-full mr-2 bg-transparent focus:border-purple-600 focus:border-2 border-purple-600 px-4" type="text" placeholder="Search Berita">
        </div>
    </div>
    <div class="lg:flex md:flex">
        <div class="sm:w-full md:w-4/6 lg:w-4/6 lg:mr-8 md:mr-8 mb-8 cursor-pointer" @click="beritaDetails(headline.image,headline.title, headline.datetime, headline.description, headline.slug)">
            <img class="m-auto" :src="headline.image" alt="">
            <div class="mt-4">
                <h1 class="text-3xl font-bold text-center">{{headline.title}}</h1>
                <span v-html="headline.description" class="text-center"></span>
            </div>
        </div>
        <div class="sm:w-full md:w-2/6 lg:w-2/6 border-purple-600 rounded-xl border-4 p-4">
            <h1 class="text-center text-2xl mb-8">Kategori</h1>
            <div class="flex flex-wrap justify-center">
                <div class="lg:w-5/12 md:w-full sm:w-5/12 xs:w-full kategori mx-2 flex items-center justify-center" v-for="category in categories" :key="category.id">
                    {{ category.text }}
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    props: ['headline', 'categories'],
    methods: {
        beritaDetails(image, title, datetime, description, slug){
            this.$router.push({name: 'BeritaDetails', params: {slug, title, image, description, datetime}})
        }
    }
}
</script>

<style scoped>
.kategori{
    background: linear-gradient(240deg, #C56FE1 0%, #CB81F2 15%, #8F41F1 100%);
    border-radius: 12px;
    color: white;
    padding: 4px;
    margin-bottom: 24px;
    text-align: center;
}
</style>