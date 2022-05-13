<template>
  <Navbar :whitetheme="whitetheme" navbaron="ourteam" style="position: fixed; width: 100%; z-index: 3"/>
  <MemberTeam :listCategory="listCategory" style="padding-top: 90px;" />
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import MemberTeam from '@/components/ComponentOurTeam/MemberTeam.vue';
import axios from 'axios';

export default {
  data(){
    return{
      whitetheme: true,
      listCategory: []
    }
  },
  components:{
    Navbar,
    MemberTeam,
  },
  created(){
    axios.get(`team`)
      .then(res => {
        this.listCategory = res.data;
        console.log(this.listCategory);
      }).catch(err => {
        console.log(err.message);
      })
  },
  methods:{
    scrollup(){
        window.scroll({
            top: 0,
            left: 0,
        })
    },
  },
  mounted(){
      this.scrollup()
  }
}
</script>

<style>

</style>