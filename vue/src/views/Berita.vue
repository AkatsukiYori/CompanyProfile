<template>
  <Navbar />
  <Headline :categoryleft="categoryleft" :categoryright="categoryright" :headline="headline"/>
  <CarouselBerita :listBerita="listBerita"/>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import Headline from '@/components/ComponentBerita/Headline.vue';
import CarouselBerita from '@/components/ComponentBerita/CarouselBerita.vue';
export default {
    data(){
        return{
            categoryleft: [
                {id: 1, text: 'test1'},
                {id: 2, text: 'test2'},
                {id: 3, text: 'test1'},
                {id: 4, text: 'test2'},
                {id: 5, text: 'test1'},
                {id: 6, text: 'test2'},
            ],
            categoryright: [
                {id: 1, text: 'test1'},
                {id: 2, text: 'test2'},
                {id: 3, text: 'test1'},
                {id: 4, text: 'test2'},
                {id: 5, text: 'test1'},
                {id: 6, text: 'test2'},
            ],
            headline: {title: 'Judul Berita abcd', description: 'Deskripsi berita abcacadabcabacba', image: require('@/assets/berita.png')},
            listBerita: [
                {id: 1, title: 'Judul Berita', image: require('@/assets/berita.png'), date: '05 Febuari 2022'},
            ]
        }
    },
    components: {
        Navbar,
        Headline,
        CarouselBerita,
    },
}
</script>

<style>

</style>