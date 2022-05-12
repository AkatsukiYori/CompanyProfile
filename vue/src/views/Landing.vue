<template>
  <div v-if="isMounted">
    <Navbar navbaron="home" style="position: fixed; width: 100%; z-index: 3"/>
    <Beranda id="home" :contents="slogan" style="padding-top: 90px;"/>
    <TentangKSD :tentangKami="tentangKami" id="about" />
    <Carousel :color1="'#e1a1ed'" :color2="'#ac7df1'" :color3="'#7658f4'" :headertitle="'Produk Kami'" :contents="products"/>
    <Gallery id="gallery" ref="gallerycomponent" :galleryItems="gallery"/>
    <Mitra id="mitra" :color1="'#e1a1ed'" :color2="'#ac7df1'" :color3="'#7658f4'" :headertitle="'Mitra'" :mitra1="mitra1" :mitra2="mitra2" :mitra3="mitra3"/>
    <OurTeam :karyawan="karyawan" :ourteamcontent="ourteamcontent"/>
    <FAQ id="faq" :contents="faqs"/>
    <Footer :kontak="kontak" id="contact"/>
  </div>
</template>
<script>
import Navbar from '@/components/Navbar.vue';
import Beranda from '@/components/Beranda.vue';
import Gallery from '@/components/Gallery.vue';
import Carousel from '@/components/Carousel.vue';
import Mitra from '@/components/Mitra.vue';
import OurTeam from '@/components/OurTeam.vue';
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
    OurTeam,
    FAQ,
    TentangKSD,
    Footer
  },
  data(){
    return{
      slogan: [
        {id: 1, image: require('@/assets/laptop.png'), title: "Slogan", description: "Inovasi Tanpa Data Adalah Inovasi Tanpa Solusi, Data Tanpa Inovasi Adalah Solusi Yang Tidak Berdampak Pada Jalan Keluar Yang Dibutuhkan", color: '#bf00fe'},
        {id: 2, image: require('@/assets/laptop.png'), title: "Visi", description: "", color: '#bf00fe'},
        {id: 3, image: require('@/assets/laptop.png'), title: "Misi", description: "", color: '#bf00fe'},
      ],
      products: [],
      faqs: [],
      mitra1: [], mitra2: [], mitra3: [],
      gallery:[],
      tentangKami: [],
      karyawan:[],
      kontak: [],
      ourteamcontent: [
        {id: 1, name: "Firman", division: "CEO", image: require('@/assets/OurTeam/Firman.png')},
        {id: 2, name: "Firman", division: "CEO", image: require('@/assets/OurTeam/Firman.png')},
        {id: 3, name: "Firman", division: "CEO", image: require('@/assets/OurTeam/Firman.png')},
        {id: 4, name: "Firman", division: "CEO", image: require('@/assets/OurTeam/Firman.png')}
      ],
      isMounted: false,
    }
  },
  methods: {
    init(){
      this.getVisiMisi()
      this.getTentangKami()
      this.getGallery()
      this.getKaryawan()
      this.getKontak()
      this.getProduk()
      this.getMitra()
      this.getFaq()
    },
    getVisiMisi(){
      axios.get(`visi_misi`)
        .then(res=>{
          this.slogan.forEach((data, index) => {
            if(data.title == "Visi"){
              this.slogan[index].description = res.data.visi
            }else if(data.title == "Misi"){
              this.slogan[index].description = res.data.misi
            }
          })
          
        })
        .catch(err => {
          console.log(err.response.data)
        })
    },
    getTentangKami(){
      axios.get(`tentang_kami`)
        .then(res => {
          this.tentangKami = res.data
        })
        .catch(err => {
          console.log(err.response.data)
        })
    },
    getKaryawan(){
      var reqOne = axios.get(`karyawan`);
      var reqTwo = axios.get(`getCarouselKaryawan`);
      
      axios.all([reqOne, reqTwo]).then(axios.spread((...res) => {
        this.karyawan = res[0].data;
        this.ourteamcontent = res[1].data;
        console.log(this.ourteamcontent)
      })).catch(err => {
        console.log(err.message);
      })
    },
    getGallery(){
      axios.get(`gallery`)
        .then(res => {
          this.gallery = res.data
          console.log(res.data)
        })
        .catch(err => {
          console.log(err)
        })
    },
    getKontak(){
      axios.get('kontak')
        .then(res => {
          this.kontak = res.data
        }).catch(err => {
          console.log(err)
        })
    },
    getProduk(){
      axios.get('produk')
        .then(res => {
          this.products = res.data
        }).catch(err => {
          console.log(err)
        })
    },
    getMitra(){
      axios.get(`mitra`)
        .then(res => {
          this.mitra1 = res.data.mitra1
          this.mitra2 = res.data.mitra2
          this.mitra3 = res.data.mitra3
        }).catch(err => {
          console.log(err)
        })
    },
    getFaq(){
      axios.get('faq')
        .then(res => {
          this.faqs = res.data
        }).catch(err => [
          console.log(err)
        ])
    },
    scrollup(){
        window.scroll({
            top: 0,
            left: 0,
        })
    },
  },
  created() {
    this.init()
  },
  mounted(){
    this.isMounted = true;
    this.scrollup()
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
