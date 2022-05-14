<template>
  <Navbar :whitetheme="whitetheme" navbaron="berita" style="position: sticky; top: 0; z-index: 3"/>
  <BeritaDetail :beritaLain="beritaLain" style=""/>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import BeritaDetail from '@/components/ComponentBerita/BeritaDetail.vue';

export default {
  data(){
    return{
      whitetheme: true,
      albumItems: [],
      albumDescription: '',
      albumTitle: '',
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
    // getParams(){
    //   this.albumItems = JSON.parse(this.$route.params.albumItems)
    //   this.albumDescription = this.$route.params.description
    //   this.albumTitle = this.$route.params.albumTitle
    // },
    scrollup(){
        window.scroll({
            top: 0,
            left: 0,
        })
    }
  },
//   created(){
//     this.getParams()
//   },
  mounted(){
    this.scrollup()
  }
}
</script>

<style>

</style>