<template>
  <Navbar/>
  <Gallery/>
</template>
<script>
import Navbar from '@/components/Navbar.vue';
import Gallery from '@/components/Gallery.vue';
export default {
  name: "App",
  components: {
    Navbar,
    Gallery,
  }
}
</script>