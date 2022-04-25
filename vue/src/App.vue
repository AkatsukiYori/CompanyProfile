<template>
  <div>
    <Navbar/>
    <Beranda />
    <TentangKSD />
    <Carousel />
    <Gallery />
    <Footer/>
  </div>
</template>
<script>
import Navbar from '@/components/Navbar.vue';
import Beranda from '@/components/Beranda.vue';
import TentangKSD from '@/components/TentangKSD.vue';
import Footer from '@/components/Footer.vue';
import Carousel from '@/components/Carousel.vue';
import Gallery from '@/components/Gallery.vue';
export default {
  name: "App",
  components: {
    Navbar,
    Beranda,
    TentangKSD,
    Footer,
    Carousel,
    Gallery
}
}
</script>