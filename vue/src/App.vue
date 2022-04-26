<template>
  <div>
    <Navbar />
    <Beranda />
    <TentangKSD />
    <Carousel :headertitle="'Products'" :contents="products"/>
    <Gallery :galleryitems="gallery"/>
    <Carousel :headertitle="'Mitra'" :contents="mitras"/>
    <FAQ :contents="faqs"/>
    <Footer />
  </div>
</template>
<script>
import Navbar from '@/components/Navbar.vue';
import Beranda from '@/components/Beranda.vue';
import Gallery from '@/components/Gallery.vue';
import Carousel from '@/components/Carousel.vue';
import FAQ from '@/components/FAQ.vue';
import TentangKSD from '@/components/TentangKSD.vue';
import Footer from '@/components/Footer.vue';
export default {
  name: "App",
  components: {
    Navbar,
    Beranda,
    Gallery,
    Carousel,
    FAQ,
    TentangKSD,
    Footer,
    Gallery
  }
}
</script>