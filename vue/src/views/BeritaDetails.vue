<template>
  <Navbar :whitetheme="whitetheme" navbaron="berita" style="position: sticky; top: 0; z-index: 3"/>
  <BeritaDetail :beritaLain="beritaLain" style=""/>
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
      beritaLain: []
    }
  },
  components:{
    Navbar,
    BeritaDetail,
  },
  methods: {
    getParams(){
      this.berita = {
        id: this.$route.params.id,
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
        })
    },
    updateViews(){
      axios.put(`berita/${this.berita.id}`)
      .catch(err => {
          console.log(err.message)
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
  },
  updated(){
    this.updateViews()
  }
}
</script>

<style>

</style>