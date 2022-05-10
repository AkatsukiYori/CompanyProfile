<template>
  <div v-for="item in karyawan" class="w-full ourteambg relative" style="height: 700px">
      <div class="absolute right-16 top-4">
          <div class="flex">
              <div>
                  <img class="w-full" :src="item.imagePC" alt="">
              </div>
              <div class="pt-4 pl-3">
                  <h1 class="font-bold text-2xl">{{item.namaPC}}</h1>
                  <p class="text-xl pb-4 border-b-2" style="border-color: rgba(0,0,0,0.2)">{{ item.jabatanPC }}</p>
              </div>
          </div>
          <div class="absolute right-0 top-32">
              <h1 class="font-bold text-2xl text-center">{{ item.namaCEO }}</h1>
              <p class="text-xl pb-4 text-center">{{ item.jabatanCEO }}</p>
              <img class="m-auto" :src="item.imageCEO" alt="">
          </div>
      </div>
      <div class="absolute left-16 bottom-4">
          <div class="absolute left-0 bottom-28">
              <img class="m-auto pb-4" :src="item.imageHR" alt="">
              <h1 class="font-bold text-2xl text-center">{{ item.namaHR }}</h1>
              <p class="text-xl pb-4 text-center">{{ item.jabatanHR }}</p>
          </div>
          <div class="flex">
              <div class="pb-4 pr-3 self-end">
                  <h1 class="font-bold border-t-2 text-2xl text-right pt-4" style="border-color: rgba(0,0,0,0.2)">{{ item.namaHN }}</h1>
                  <p class="text-xl text-right">{{ item.jabatanHN }}</p>
              </div>
              <div>
                  <img :src="item.imageHN" alt="">
              </div>
          </div>
      </div>
      <div style="top: 48%" class="absolute left-2/4 -translate-x-2/4 -translate-y-2/4 w-full">
          <h1 style="transform: rotate(28deg)" class="text-white text-5xl font-bold text-center">Our Team</h1>
          <p style="transform: rotate(28deg)" class="text-white text-xl text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <router-link :to="{ name: 'OurTeam' }" href="#" class="font-bold text-white text-2xl absolute right-4 bottom-4">
        See More >
        {{ pc.nama }}
      </router-link>
  </div>
</template>

<script>
export default {
    props: ['karyawan'],
    data(){
        return{
            pc: {}
        }
    },
    methods: {
      getJabatan(input){
          console.log(input)
      } 
    },
    updated(){
        // console.log([... this.karyawan])
        console.log(this.karyawan)
    }
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