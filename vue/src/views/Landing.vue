<template>
  <div class="home">
    <Navbar />
    <Beranda />
    <TentangKSD />
    <Carousel :color1="'#e1a1ed'" :color2="'#ac7df1'" :color3="'#7658f4'" :headertitle="'Products'" :contents="products"/>
    <Gallery :galleryitems="gallery"/>
    <Carousel :color1="'#e1a1ed'" :color2="'#ac7df1'" :color3="'#7658f4'" :headertitle="'Mitra'" :contents="mitras"/>
    <FAQ :contents="faqs"/>
    <Footer />
  </div>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import Beranda from '@/components/Beranda.vue';
import FAQ from '@/components/FAQ.vue';
import TentangKSD from '@/components/TentangKSD.vue';
import Footer from '@/components/Footer.vue';
import Carousel from '@/components/Carousel.vue';
import Gallery from '@/components/Gallery.vue';
export default {
  name: "App",
  components: {
    Navbar,
    Beranda,
    Gallery,
    Carousel,
    FAQ,
    TentangKSD,
    Footer
  },
  data(){
    return{
      slogan: [
        {id: 1, image: require('@/assets/logo.png'), title: "", content: ""},
      ],
      products: [
        {id: 1, image: require('@/assets/logo.png')},
        {id: 2, image: require('@/assets/logotest.jpg')},
        {id: 3, image: require('@/assets/logo.png')},
        {id: 4, image: require('@/assets/logotest.jpg')},
        {id: 5, image: require('@/assets/logo.png')},
        {id: 6, image: require('@/assets/logotest.jpg')},
        {id: 7, image: require('@/assets/logo.png')},
        {id: 8, image: require('@/assets/logotest.jpg')},
        {id: 9, image: require('@/assets/logotest.jpg')},
      ],
      faqs: [
        {id: 1, question: "Apa kabar?", answer: "Baik"},
        {id: 2, question: "Apa kabar2?", answer: "Baik"},
        {id: 3, question: "Apa kabar3?", answer: "Baik"},
        {id: 4, question: "Apa kabar4?", answer: "Baik"},
        {id: 5, question: "Apa kabar5?", answer: "Baik"},
      ],
      mitras: [
        {id: 1, image: require('@/assets/logo.png')},
        {id: 2, image: require('@/assets/logo.png')},
        {id: 3, image: require('@/assets/logo.png')},
        {id: 4, image: require('@/assets/logo.png')},
        {id: 5, image: require('@/assets/logo.png')},
        {id: 6, image: require('@/assets/logo.png')},
        {id: 7, image: require('@/assets/logo.png')},
        {id: 8, image: require('@/assets/logo.png')},
        {id: 9, image: require('@/assets/logo.png')},
      ],
      gallery:[
        {id: 1, type: "image", src: require("@/assets/logo.png")},
        {id: 2, type: "image", src: require("@/assets/logotest.jpg")},
        {id: 3, type: "image", src: require("@/assets/logotest.jpg")},
        {id: 4, type: "video", src: require("@/assets/testvideo.mp4")},
        {id: 5, type: "link", src: 'https://www.youtube.com/embed/9EDZixuODrw'},
        {id: 6, type: "video", src: require("@/assets/testvideo.mp4")},
        {id: 7, type: "image", src: require("@/assets/logo.png")},
        {id: 8, type: "image", src: require("@/assets/logo.png")},
        {id: 8, type: "morebutton", src: require("@/assets/logo.png")},
      ],
      Album: [
        {id: 1, name: "18 Oktober 1918", deskripsi: "Kami kembali ke masa penjajahan Belanda pada tanggal 18 Oktober 1918", tgl_album: "22 Juni 2021"},
        {id: 2, name: "19 Oktober 1918", deskripsi: "Kami kembali ke masa penjajahan Belanda pada tanggal 18 Oktober 1918", tgl_album: "22 Juni 2021"},
        {id: 3, name: "20 Oktober 1918", deskripsi: "Kami kembali ke masa penjajahan Belanda pada tanggal 18 Oktober 1918", tgl_album: "22 Juni 2021"},
      ]
    }
  }
}
</script>
<style scoped>
@import url('@/assets/css/bootstrap.min.css');
@import url('@/assets/css/all.min.css');
@import url('@/assets/css/animate.css');
@import url('@/assets/css/nice-select.css');
@import url('@/assets/css/owl.min.css');
@import url('@/assets/css/magnific-popup.css');
@import url('@/assets/css/flaticon.css');
@import url('@/assets/css/main.css');
</style>
