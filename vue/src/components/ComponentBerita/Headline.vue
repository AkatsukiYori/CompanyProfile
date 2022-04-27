<template>
  <div class="p-8">
    <h1 class="text-4xl font-bold">Berita Terkini</h1>
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
    props: ['categoryleft', 'categoryright', 'headline']
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