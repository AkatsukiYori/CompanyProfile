<template>
<div>
  <div ref="containerref" class="button-container xs:hidden md:block">
    <h1 class="overflow-y-hidden pt-16 m-auto text-center  text-white text-4xl">{{headertitle}}</h1>
    <carousel ref="carousel" :items-to-show="5.5" :items-to-scroll="1" class="pt-16" :wrap-around="true" :breakpoints="breakpoints" :autoplay="1000">
      <slide v-for="m1 in mitra1" :key="m1.id">
        <img :src="m1.image" alt="" class="w-6/12">
      </slide>
    </carousel>
    <carousel ref="carousel" :items-to-show="5.5" :items-to-scroll="1" class="py-8" :wrap-around="true" :breakpoints="breakpoints" :autoplay="1500">
      <slide v-for="m2 in mitra2" :key="m2.id">
        <img :src="m2.image" alt="" class="w-6/12">
      </slide>
    </carousel>
    <carousel ref="carousel" :items-to-show="5.5" :items-to-scroll="1" class="pb-16" :wrap-around="true" :breakpoints="breakpoints" :autoplay="2000">
      <slide v-for="m3 in mitra3" :key="m3.id">
        <img :src="m3.image" alt="" class="w-6/12">
      </slide>
    </carousel>
  </div>

  <div ref="containerref2" class="button-container xs:block md:hidden">
    <h1 class="overflow-y-hidden pt-16 m-auto text-center  text-white text-4xl">{{headertitle}}</h1>
    <carousel ref="carousel" :items-to-show="2.9" :items-to-scroll="1" class="pt-16" :wrap-around="true" :breakpoints="breakpoints" :autoplay="1500">
      <slide v-for="m1 in mitra1" :key="m1.id">
        <img :src="m1.image" alt="" class="w-6/12">
      </slide>
    </carousel>
    <carousel ref="carousel" :items-to-show="2.9" :items-to-scroll="1" class="py-8" :wrap-around="true" :breakpoints="breakpoints" :autoplay="2000">
      <slide v-for="m2 in mitra2" :key="m2.id">
        <img :src="m2.image" alt="" class="w-6/12">
      </slide>
    </carousel>
    <carousel ref="carousel" :items-to-show="2.9" :items-to-scroll="1" class="pb-16" :wrap-around="true" :breakpoints="breakpoints" :autoplay="2500">
      <slide v-for="m3 in mitra3" :key="m3.id">
        <img :src="m3.image" alt="" class="w-6/12">
      </slide>
    </carousel>
  </div>
</div>

</template>

<script>
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

export default {
  props: ['headertitle', 'color1', 'color2', 'color3', 'mitra1', 'mitra2', 'mitra3'],
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },
  data(){
    return{
    }
  },
  methods: {
    changeCarouselBg(){
      this.$refs.containerref.style.background = 'linear-gradient(16deg, '+this.color1+' 0%, '+this.color2+' 65%, '+this.color3+' 100%)'
      this.$refs.containerref2.style.background = 'linear-gradient(16deg, '+this.color1+' 0%, '+this.color2+' 65%, '+this.color3+' 100%)'
    },
    next() {
      this.$refs.carousel.next()
    },
    prev() {
      this.$refs.carousel.prev()
    },
  },
  mounted(){
    this.changeCarouselBg()
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

*{
  overflow-x: hidden;
}
.nextbutton img, .prevbutton img{
  background: #262f6e;
  border-radius: 100%;
  width: 50px;
  height: 50px;
  object-fit: cover;
  object-position: 0 -20%;
}

.nextbutton, .prevbutton{
  position: absolute;
  top: 70%;
  transform: translateY(-50%);
  transition: 0.5s;
}

.nextbutton{
  left: 20px;
}

.prevbutton{
  right: 20px;
}

.button-container{
  position: relative;
}
</style>