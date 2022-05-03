<template>
  <Navbar />
  <ListAlbum :listAlbum="listAlbum"/>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import ListAlbum from '@/components/ComponentAlbum/ListAlbum.vue';
import axios from 'axios';

export default {
  data(){
    return{
      listAlbum: []
    }
  },
  components:{
    Navbar,
    ListAlbum,
  },
  methods: {
    getAlbums(){
      axios.get(`albums`)
        .then(res => {
          this.listAlbum = res.data
          console.log(this.listAlbum)
        }).catch(err => {
          console.log(err)
        })
    }
  },
  created(){
    this.getAlbums()
  }
}
</script>

<style>

</style>