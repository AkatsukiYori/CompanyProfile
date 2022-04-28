<template>
  <div class="p-8 mb-12">
    <div class="flex justify-between">
        <h1 class="text-4xl font-bold pb-8">Berita Terkini</h1>
        <div class="flex items-center self-start">
            <input class="rounded-3xl border-2 mr-2 bg-transparent focus:border-purple-600 focus:border-2 border-purple-600 px-4" type="text" placeholder="Search Berita">
            <img src="@/assets/magnifying.png" alt="" class="w-8 h-8">
        </div>
    </div>
    <div class="flex">
        <div class="w-4/6">
            <img :src="headline.image" alt="">
            <div style="margin-right: 2.5rem">
                <h1 class="text-3xl font-bold text-center">{{headline.title}}</h1>
                <p class="text-center">{{headline.description}}</p>
            </div>
        </div>
        <div class="w-2/6 border-purple-600 rounded-xl border-4 p-4">
            <h1 class="text-center text-2xl mb-8">Kategori</h1>
            <div class="flex">
                <div class="w-6/12 pr-4">
                    <div v-for="kategori in categoryleft" :key="kategori.id" class="kategori">{{kategori.text}}</div>
                </div>
                <div class="w-6/12 pl-4">
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