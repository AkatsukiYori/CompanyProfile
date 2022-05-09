<template>
<div>
  <div class="w-full ourteambg relative lg:block md:hidden sm:hidden xs:hidden" style="height: 700px">
      <div class="absolute right-16 top-4">
          <div class="flex">
              <div>
                  <img class="w-48 h-48 rounded-full" src="@/assets/OurTeam/Ratri.png" alt="">
              </div>
              <div class="pt-4 pl-3">
                  <h1 class="font-bold text-2xl">Ratri Kanti Restu, SP, M. Pd</h1>
                  <p class="text-xl pb-4 border-b-2" style="border-color: rgba(0,0,0,0.2)">President Commissioner</p>
              </div>
          </div>
          <div class="absolute right-0 top-32">
              <h1 class="font-bold text-2xl text-center">Firman Cahyadi</h1>
              <p class="text-xl pb-4 text-center">Chief Executive Officer</p>
              <img class="w-48 h-48 m-auto rounded-full" src="@/assets/OurTeam/Firman.png" alt="">
          </div>
      </div>
      <div class="absolute left-16 bottom-4">
          <div class="absolute left-0 bottom-28">
              <img class="w-48 h-48 m-auto rounded-full" src="@/assets/OurTeam/Erwin.png" alt="">
              <h1 class="font-bold text-2xl text-center mt-4">Erwin Adhi Pratama</h1>
              <p class="text-xl pb-4 text-center">Head of Relationship</p>
          </div>
          <div class="flex">
              <div class="pb-4 pr-3 self-end">
                  <h1 class="font-bold border-t-2 text-2xl text-right pt-4" style="border-color: rgba(0,0,0,0.2)">Endrieqa Surachman</h1>
                  <p class="text-xl text-right">Head of Network and Infrastructure</p>
              </div>
              <div>
                  <img class="w-48 h-48 rounded-full" src="@/assets/OurTeam/Endrieqa.png" alt="">
              </div>
          </div>
      </div>
      <div style="top: 48%" class="absolute left-2/4 -translate-x-2/4 -translate-y-2/4 w-full">
          <h1 style="transform: rotate(28deg)" class="text-white text-5xl font-bold text-center">Our Team</h1>
          <p style="transform: rotate(28deg)" class="text-white text-xl text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <router-link :to="{ name: 'OurTeam' }" href="#" class="font-bold text-white text-2xl absolute right-4 bottom-4">
        See More >
      </router-link>
  </div>
  <div class="w-full ourteambg relative lg:hidden md:block sm:block xs:block" style="height: 700px">
    <carousel ref="carousel" :items-to-show="1" :items-to-scroll="1" class="md:pt-32 sm:pt-54 xs:pt-44" :wrap-around="true" :breakpoints="breakpoints" :autoplay="3000">
        <slide class="flex-col" v-for="member in ourteamcontent" :key="member.id">
            <img :src="member.image" alt="" class="md:w-4/12 sm:w-6/12 xs:w-6/12">
            <h1 class="text-4xl text-white font-bold text-center block border-b-2 border-slate-600">{{member.name}}</h1>
            <p class="text-xl text-white text-center block">{{member.division}}</p>
        </slide>
    </carousel>
    <div class="absolute top-8 left-8 w-full">
        <h1 class="text-white md:text-5xl sm:text-3xl xs:text-2xl font-bold">Our Team</h1>
        <p class="text-white text-base md:w-full sm:w-1/2 xs:w-1/2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
      <router-link :to="{ name: 'OurTeam' }" href="#" class="font-bold text-white text-2xl absolute right-4 bottom-4">
        See More >
      </router-link>
  </div>
</div>
</template>

<script>
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

export default {
    props: ['ourteamcontent'],
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
}
</script>

<style>
.ourteambg{
    background-image: url('@/assets/ourteambg.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
</style>