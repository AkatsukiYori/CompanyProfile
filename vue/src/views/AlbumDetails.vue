<template>
  <Navbar />
  <AlbumDetail :albumItems="albumItems" :title="albumTitle" :description="albumDescription"/>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import AlbumDetail from '@/components/ComponentAlbum/AlbumDetail.vue';

export default {
  data(){
    return{
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
    }
  },
  created(){
    this.getParams()
  }
}
</script>

<style>

</style>