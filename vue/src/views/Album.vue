<template>
  <Navbar />
  <ListAlbum :listRowAlbum="listRowAlbum"/>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import ListAlbum from '@/components/ComponentAlbum/ListAlbum.vue';

export default {
  data(){
    return{
      listRowAlbum: [
        {
          id: 1,
          listAlbum: [
            {id: 1, title: 'Album Perpisahan', date: '05 Febuari 2022', image: require('@/assets/berita.png')},
            {id: 2, title: 'Album Perpisahan 2', date: '05 Febuari 2022', image: require('@/assets/berita.png')},
            {id: 3, title: 'Album Perpisahan 3', date: '05 Febuari 2022', image: require('@/assets/berita.png')},
          ]
        },
        {
          id: 2,
          listAlbum: [
            {id: 1, title: 'Album Perpisahan', date: '05 Febuari 2022', image: require('@/assets/berita.png')},
            {id: 2, title: 'Album Perpisahan 2', date: '05 Febuari 2022', image: require('@/assets/berita.png')},
            {id: 3, title: 'Album Perpisahan 3', date: '05 Febuari 2022', image: require('@/assets/berita.png')},
          ]
        },
      ],
    }
  },
  components:{
    Navbar,
    ListAlbum,
  }
}
</script>

<style>

</style>