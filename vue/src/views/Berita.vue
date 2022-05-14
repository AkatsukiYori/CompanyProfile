<template>
  <Navbar :whitetheme="whitetheme" navbaron="berita" style="position: fixed; width: 100%; z-index: 3"/>
  <Headline :categories="categoryleft" :headline="headline" style="padding-top: 130px;"/>
  <CarouselBerita class="lg:block md:block sm:hidden xs:hidden hilang" :numOfElements=3 :carouselBerita="carouselBerita"/>
  <CarouselBerita class="lg:hidden md:hidden sm:block xs:block hilang" :numOfElements=1 :carouselBerita="carouselBerita"/>
  <ListBerita :listBerita="listBerita" class="hilang"/>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import Headline from '@/components/ComponentBerita/Headline.vue';
import CarouselBerita from '@/components/ComponentBerita/CarouselBerita.vue';
import ListBerita from '@/components/ComponentBerita/ListBerita.vue';
import axios from 'axios';
export default {
    data(){
        return{
            whitetheme: true,
            categoryleft: [],
            headline: {},
            carouselBerita: [],
            listBerita: [],
            search: false
        }
    },
    components: {
        Navbar,
        Headline,
        CarouselBerita,
        ListBerita,
    },
    methods: {
        scrollup(){
            window.scroll({
                top: 0,
                left: 0,
            })
        }
    },
    created(){
        axios.get(`berita`)
            .then(res => {
                this.headline = res.data.headline;
                this.categoryleft = res.data.category;
                this.listBerita = res.data.berita;
                this.carouselBerita = res.data.random;
            })
            .catch(err => {
                console.log(err.message)
            })
    },
    mounted(){
        this.scrollup()
    }
}
</script>

<style>
.hilangbeneran{
    display: none !important;
}
</style>