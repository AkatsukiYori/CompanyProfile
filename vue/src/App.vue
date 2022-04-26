<template>
  <div>
    <Navbar/>
    <Beranda />
    <Carousel />
    <TentangKSD />
    <Gallery />
    <Footer/>
  </div>
</template>
<script>
import Navbar from '@/components/Navbar.vue';
import Beranda from '@/components/Beranda.vue';
import Carousel from '@/components/Carousel.vue';
import TentangKSD from '@/components/TentangKSD.vue';
import Footer from '@/components/Footer.vue';
import Gallery from '@/components/Gallery.vue';
export default {
  name: "App",
  components: {
    Navbar,
    Beranda,
    Carousel,
    TentangKSD,
    Footer,
    Gallery
  }
}
</script>