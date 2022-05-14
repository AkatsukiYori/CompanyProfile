<template>
  <Navbar :whitetheme="whitetheme" navbaron="album" style="position: sticky; top: 0; z-index: 3"/>
  <AlbumDetail :albumItems="albumItems" :title="albumTitle" :description="albumDescription" style=""/>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import AlbumDetail from '@/components/ComponentAlbum/AlbumDetail.vue';

export default {
  data(){
    return{
      whitetheme: true,
      albumItems: [],
      albumDescription: '',
      albumTitle: ''
    }
  },
  components:{
    Navbar,
    AlbumDetail,
  },
  methods: {
    getParams(){
      this.albumItems = JSON.parse(this.$route.params.albumItems)
      this.albumDescription = this.$route.params.description
      this.albumTitle = this.$route.params.albumTitle
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
  },
  mounted(){
      this.scrollup()
  }
}
</script>

<style>

</style>