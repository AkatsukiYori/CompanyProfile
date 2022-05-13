<template>
  <Navbar :whitetheme="whitetheme" navbaron="berita" style="position: fixed; width: 100%; z-index: 3"/>
  <BeritaDetail :beritaLain="beritaLain" :berita="berita" style="padding-top: 100px;"/>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import BeritaDetail from '@/components/ComponentBerita/BeritaDetail.vue';
import axios from 'axios';

export default {
  data(){
    return{
      whitetheme: true,
      berita: {},
      beritaLain: [
        {id: 1, title: 'judul', date: '05 Febuari 2022', image: require('@/assets/logo.png')},
        {id: 2, title: 'judul', date: '05 Febuari 2022', image: require('@/assets/logo.png')},
        {id: 3, title: 'judul', date: '05 Febuari 2022', image: require('@/assets/logo.png')},
      ]
    }
  },
  components:{
    Navbar,
    BeritaDetail,
  },
  methods: {
    getParams(){
      this.berita = {
        title: this.$route.params.title,
        image: this.$route.params.image,
        description: this.$route.params.description,
        slug: this.$route.params.slug,
        datetime: this.$route.params.datetime,
      }
    },
    getBeritaLain(){
      axios.get(`berita`)
        .then(res => {
          this.beritaLain = res.data.random
          console.log(this.beritaLain)
        })
    },
    scrollup(){
        window.scroll({
            top: 0,
            left: 0,
        })
    }
  },
  created(){
    this.getParams()
    this.getBeritaLain()
  },
  mounted(){
    this.scrollup()
  }
}
</script>

<style>

</style>