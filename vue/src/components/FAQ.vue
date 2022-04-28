<template>                                
<section class="testimonial-section padding-top padding-bottom pt-lg-half ">
        <div class="container">
            <div class="section-header">
                <h5 class="cate text-4xl text-purple-600">FAQ</h5>
                <h2 class="title">The answer to all your questions</h2>
            </div>
            <div class="testimonial-wrapper">
                <a href="#0" class="testi-next trigger">
                    <img @click="prev()" src="@/assets/images/client/left.png" alt="client">
                </a>
                <a href="#0" class="testi-prev trigger">
                    <img @click="next()" src="@/assets/images/client/right.png" alt="client">
                </a>
                <carousel ref="carousel" :items-to-show="1" :items-to-scroll="1" class="testimonial-slider owl-theme pt-24 pb-12" :wrap-around="true" :breakpoints="breakpoints" :autoplay="3000">
                  <slide class="testimonial-item" v-for="content in contents" :key="content.id">
                    <div>
                      <h1 class="text-6xl">{{content.question}}</h1>
                      <h3 class="text-3xl">{{content.answer}}</h3>
                    </div>
                  </slide>
                </carousel>
            </div>
        </div>
    </section>
</template>

<script>
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

export default {
  props: ['contents'],  
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
    next() {
      this.$refs.carousel.next()
    },
    prev() {
      this.$refs.carousel.prev()
    },
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