<template>
  <div class="mb-8">
    <div class="flex items-center w-auto h-24 ml-8 mb-8">
      <img src="@/assets/arrow.png" class="w-6 h-6 mr-2" alt="">
      <router-link :to="{ path: '/berita' }" href="#" class="text-xl font-bold">
        Back to Home
      </router-link>
    </div>
    <div class="flex mx-32">
      <div class="basis-10/12 md:mr-32">
        <h1 class="text-left text-5xl font-bold text-slate-700 break-all mb-2">{{ berita.title }}</h1>
        <p class="text-lg font-semibold">{{ berita.datetime }}</p>
        <img :src="berita.image" class="w-full my-12" alt="">
        <span v-html="berita.description"></span>
      </div>
      <div class="basis-3/12">
        <div class="beritalain w-full mr-8 overflow-y-scroll pb-8" >
          <p class="text-2xl text-center font-bold border-b-4 pb-2 border-purple-600 text-slate-700">Berita Lainnya</p>
          <div class="relative p-4" v-for="berita in beritaLain" :key="berita.id">
            <img :src="berita.image" alt="" class="w-full">
            <div class="p-4 absolute left-0 top-0 w-full h-full opacity-0 hover:opacity-100 transition-all duration-300">
                <div class="relative w-full h-full">
                    <div class="absolute bottom-0 left-0">
                        <h1 class="font-bold text-white z-10 relative lg:text-3xl md:text-2xl sm:text-3xl xs:text-2xl text-left">{{berita.title}}</h1>
                        <p class="text-white z-10 relative lg:text-lg md:text-base sm:text-lg xs:text-lg text-left">{{berita.date}}</p>
                    </div>
                </div>
                <div class="bg-black z-0 opacity-50 w-full h-full absolute left-0 top-0"></div>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['beritaLain', 'berita'],
}
</script>

<style scoped>
.beritalain::-webkit-scrollbar { 
    display: none;  /* Safari and Chrome */
}
</style>