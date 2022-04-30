<template>
  <div class="p-8 mb-12">
    <div class="flex justify-between">
        <h1 class="text-4xl font-bold pb-8">Berita Terkini</h1>
        <div class="flex items-center self-start">
            <input class="rounded-3xl border-2 mr-2 bg-transparent focus:border-purple-600 focus:border-2 border-purple-600 px-4" type="text" placeholder="Search Berita">
            <img src="@/assets/magnifying.png" alt="" class="w-8 h-8">
        </div>
    </div>
    <div class="lg:flex md:flex">
        <div class="sm:w-full md:w-4/6 lg:w-4/6 lg:mr-8 md:mr-8 mb-8">
            <img class="m-auto" :src="headline.image" alt="">
            <div>
                <h1 class="text-3xl font-bold text-center">{{headline.title}}</h1>
                <p class="text-center">{{headline.description}}</p>
            </div>
        </div>
        <div class="sm:w-full md:w-2/6 lg:w-2/6 border-purple-600 rounded-xl border-4 p-4">
            <h1 class="text-center text-2xl mb-8">Kategori</h1>
            <div class="lg:flex sm:flex">
                <div class="lg:w-6/12 lg:pr-4 sm:w-6/12 sm:pr-4">
                    <div v-for="kategori in categoryleft" :key="kategori.id" class="kategori">{{kategori.text}}</div>
                </div>
                <div class="lg:w-6/12 lg:pl-4 sm:w-6/12 sm:pr-4">
                    <div v-for="kategori in categoryright" :key="kategori.id" class="kategori">{{kategori.text}}</div>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    props: ['headline', 'categoryleft', 'categoryright']
}
</script>

<style scoped>
.kategori{
    width: 100%;
    background: linear-gradient(240deg, #C56FE1 0%, #CB81F2 15%, #8F41F1 100%);
    border-radius: 12px;
    color: white;
    padding: 4px;
    height: 40px;
    margin-bottom: 24px;
    text-align: center;
}
</style>