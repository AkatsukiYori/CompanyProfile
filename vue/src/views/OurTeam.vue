<template>
  <Navbar :whitetheme="whitetheme" navbaron="ourteam"/>
  <MemberTeam :listCategory="listCategory"/>
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