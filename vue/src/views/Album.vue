<template>
  <Navbar :whitetheme="whitetheme" navbaron="album"/>
  <ListAlbum ref="list" :data="data" :listAlbum="listAlbum"/>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import ListAlbum from '@/components/ComponentAlbum/ListAlbum.vue';
import axios from 'axios';

export default {
  data(){
    return{
      whitetheme: true,
      listAlbum: [],
      data: null
    }
  },
  components:{
    Navbar,
    ListAlbum,
  },
  methods: {
    getAlbums(value){
      if(!value){
          axios.get(`albums`)
          .then(res => {
            this.listAlbum = res.data
          }).catch(err => {
            console.log(err)
          })
      }else{
        axios.get(`albums/${value}`)
          .then(res => {
            this.listAlbum = res.data
          }).catch(err => {
            console.log(err.message)
          })
      }
    },
    scrollup(){
        window.scroll({
            top: 0,
            left: 0,
        })
    },
  },
  created(){
    this.getAlbums()
  },
  mounted(){
    this.$watch(
    "$refs.list.data", (new_value, old_value) => {
      this.getAlbums(new_value)
    })
    this.scrollup()
  },
}
</script>

<style>

</style>