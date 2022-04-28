<template>
  <Navbar />
  <AlbumDetail :listAlbum="listAlbum"/>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import AlbumDetail from '@/components/ComponentAlbum/AlbumDetail.vue';

export default {
  data(){
    return{
      listAlbum: [
        {
            id: 1,
            title: 'Album Perpisahan',
            description: 'Album berisi kenangan',
            listGambar: [
                {id: 1, type: "video", src: require("@/assets/testvideo.mp4")},
                {id: 2, type: "image", src: require('@/assets/berita.png')},
                {id: 3, type: "link", src: 'https://www.youtube.com/embed/9EDZixuODrw', videoid: '9EDZixuODrw'},
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
    AlbumDetail,
  }
}
</script>

<style>

</style>