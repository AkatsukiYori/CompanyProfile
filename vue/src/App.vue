<template>
  <div>
    <Navbar/>
    <Beranda />
    <TentangKSD />
    <Gallery/>
    <FAQs/>
    <Footer />
  </div>
</template>
<script>
import Navbar from '@/components/Navbar.vue';
import Beranda from '@/components/Beranda.vue';
import TentangKSD from '@/components/TentangKSD.vue';
import FAQs from '@/components/FAQs.vue';
import Footer from '@/components/Footer.vue';
import Gallery from '@/components/Gallery.vue';
export default {
  name: "App",
  components: {
    Navbar,
    Beranda,
    TentangKSD,
    FAQs,
    Footer,
    Gallery,
    FAQs
}
}
</script>