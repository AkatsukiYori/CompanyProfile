<template>
  <Navbar />
  <AlbumDetail :AlbumDetail="AlbumDetail"/>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import AlbumDetail from '@/components/ComponentAlbum/AlbumDetail.vue';

export default {
  data(){
    return{
      isiAlbum: [
        {
            id: 1,
            title: 'Album Perpisahan',
            description: 'Album berisi kenangan',
            listGambar: [
                {id: 1, type: "image", src: require('@/assets/berita.png')},
                {id: 2, type: "image", src: require('@/assets/berita.png')},
                {id: 3, type: "image", src: require('@/assets/berita.png')},
            ]
        },
        {
            id: 2,
            title: 'Album Perpisahan 2019',
            description: 'Album berisi kenangan',
            listGambar: [
                {id: 1, type: "image", src: require('@/assets/berita.png')},
                {id: 2, type: "image", src: require('@/assets/berita.png')},
                {id: 3, type: "image", src: require('@/assets/berita.png')},
            ]
        },
        {
            id: 3,
            title: 'Album Perpisahan',
            description: 'Album berisi kenangan',
            listGambar: [
                {id: 1, type: "image", src: require('@/assets/berita.png')},
                {id: 2, type: "image", src: require('@/assets/berita.png')},
                {id: 3, type: "image", src: require('@/assets/berita.png')},
            ]
        },
      ]
    }
  },
  components:{
    Navbar,
    ListAlbum,
    AlbumDetail,
  }
}
</script>

<style>

</style>