<template>
<div ref="containerref" class="button-container">
  <h1 class="overflow-y-hidden pt-16 m-auto text-center text-white text-4xl">{{headertitle}}</h1>
  <carousel ref="carousel" :items-to-show="3.3" :items-to-scroll="1" class="pt-16 pb-12" :wrap-around="true" :breakpoints="breakpoints" :autoplay="3000">
    <slide v-for="content in contents" :key="content.id">
      <img :src="content.image" alt="" class="w-9/12">
    </slide>
  </carousel>
    <a href="#0" class="nextbutton">
        <img @click="prev()" src="@/assets/images/client/left.png" alt="client">
    </a>
    <a href="#0" class="prevbutton">
        <img @click="next()" src="@/assets/images/client/right.png" alt="client">
    </a>
</div>
</template>

<script>
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

export default {
  props: ['contents', 'headertitle', 'color1', 'color2', 'color3'],
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