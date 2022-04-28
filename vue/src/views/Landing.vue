<template>
  <div>
    <Navbar />
    <Beranda :contents="slogan"/>
    <TentangKSD />
    <Carousel :color1="'#e1a1ed'" :color2="'#ac7df1'" :color3="'#7658f4'" :headertitle="'Produk Kami'" :contents="products"/>
    <Gallery :galleryitems="gallery"/>
    <Mitra :color1="'#e1a1ed'" :color2="'#ac7df1'" :color3="'#7658f4'" :headertitle="'Mitra'" :mitra1="mitra1" :mitra2="mitra2" :mitra3="mitra3"/>
    <FAQ :contents="faqs"/>
    <Footer />
  </div>
</template>
<script>
import Navbar from '@/components/Navbar.vue';
import Beranda from '@/components/Beranda.vue';
import Gallery from '@/components/Gallery.vue';
import Carousel from '@/components/Carousel.vue';
import Mitra from '@/components/Mitra.vue';
import FAQ from '@/components/FAQ.vue';
import TentangKSD from '@/components/TentangKSD.vue';
import Footer from '@/components/Footer.vue';
import axios from 'axios';
export default {
  name: "App",
  components: {
    Navbar,
    Beranda,
    Gallery,
    Carousel,
    Mitra,
    FAQ,
    TentangKSD,
    Footer
  },
  data(){
    return{
      slogan: [
        {id: 1, image: require('@/assets/laptop.png'), title: "Slogan", description: "Inovasi Tanpa Data Adalah Inovasi Tanpa Solusi, Data Tanpa Inovasi Adalah Solusi Yang Tidak Berdampak Pada Jalan Keluar Yang Dibutuhkan", color: '#bf00fe'},
        {id: 2, image: require('@/assets/laptop.png'), title: "Visi", description: "Membangun sebuah layanan digital yang bermanfaat untuk Indonesia yang menggunakan teknologi untuk menciptakan dampak dan solusi di bidang pendidikan, ketenagakerjaan dan sosial.", color: '#bf00fe'},
        {id: 3, image: require('@/assets/laptop.png'), title: "Misi", description: "Menciptakan layanan digital dan edukasi kepada setiap user dalam peningkatan interpersonal skill yang berdampak pada lingkungan user", color: '#bf00fe'},
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
      mitra1: [
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
      mitra2: [
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
      mitra3: [
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
        {id: 1, type: "image", src: require("@/assets/logo.png"), videoid: ''},
        {id: 2, type: "image", src: require("@/assets/logotest.jpg"), videoid: ''},
        {id: 3, type: "image", src: require("@/assets/logotest.jpg"), videoid: ''},
        {id: 4, type: "video", src: require("@/assets/testvideo.mp4"), videoid: ''},
        {id: 5, type: "link", src: 'https://www.youtube.com/embed/9EDZixuODrw', videoid: '9EDZixuODrw'},
        {id: 6, type: "video", src: require("@/assets/testvideo.mp4"), videoid: ''},
        {id: 7, type: "image", src: require("@/assets/logo.png"), videoid: ''},
        {id: 8, type: "image", src: require("@/assets/logo.png"), videoid: ''},
        {id: 8, type: "morebutton", src: require("@/assets/logo.png"), videoid: ''},
      ],
      tentangKami: [],
      dataCoba: []
    }
  },
  methods: {
    init(){
      this.getVisiMisi()
      this.getTentangKami()
      this.getGallery()
    },
    getVisiMisi(){
      axios.get(`http://localhost:8000/api/visi_misi`)
        .then(res=>{
          console.log(res.data)
        })
        .catch(err => {
          console.log(err.response.data)
        })
    },
    getTentangKami(){
      axios.get(`http://localhost:8000/api/tentang_kami`)
        .then(res => {
          this.tentangKami = res.data
          this.tentangKami.forEach((data) => {
            console.log(data)
          })
        })
        .catch(err => {
          console.log(err.response.data)
        })
    },
    getGallery(){
      axios.get(`http://localhost:8000/api/gallery`)
        .then(res => {
          this.dataCoba = res.data
          this.dataCoba.forEach((data) => {
            console.log(data)
          })
        })
        .catch(err => {
          console.log(err.response.data)
        })
    }
  },
  created() {
    this.init()
  },
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
