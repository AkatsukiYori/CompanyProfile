<template>
  <Navbar />
  <AlbumDetail :listAlbum="listAlbum"/>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import AlbumDetail from '@/components/ComponentAlbum/AlbumDetail.vue';
import ListAlbum from '@/components/ComponentAlbum/ListAlbum.vue';

export default {
  data(){
    return{
      listAlbum: [
        {
            id: 1,
            title: 'Album Perpisahan',
            description: 'Album berisi kenangan',
            albumItems:[
              {id: 1, type: "video", src: require("@/assets/testvideo.mp4"), videoid: ''},
              {id: 2, type: "image", src: require("@/assets/logotest.jpg"), videoid: ''},
              {id: 3, type: "image", src: require("@/assets/logotest.jpg"), videoid: ''},
              {id: 4, type: "video", src: require("@/assets/testvideo.mp4"), videoid: ''},
              {id: 5, type: "link", src: 'https://www.youtube.com/embed/9EDZixuODrw', videoid: '9EDZixuODrw'},
              {id: 6, type: "video", src: require("@/assets/testvideo.mp4"), videoid: ''},
              {id: 7, type: "image", src: require("@/assets/logo.png"), videoid: ''},
              {id: 8, type: "image", src: require("@/assets/logo.png"), videoid: ''},
              {id: 9, type: "image", src: require("@/assets/logo.png"), videoid: ''},
              {id: 10, type: "image", src: require("@/assets/logo.png"), videoid: ''},
              {id: 11, type: "image", src: require("@/assets/logo.png"), videoid: ''},
              {id: 12, type: "image", src: require("@/assets/logo.png"), videoid: ''},
              {id: 13, type: "image", src: require("@/assets/logo.png"), videoid: ''},
              {id: 14, type: "image", src: require("@/assets/logo.png"), videoid: ''},
            ],
        }
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