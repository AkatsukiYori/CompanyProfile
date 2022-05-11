<template>
  <Navbar />
  <MemberTeam :listCategory="listCategory"/>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import MemberTeam from '@/components/ComponentOurTeam/MemberTeam.vue';
import axios from 'axios';

export default {
  data(){
    return{
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
  }
}
</script>

<style>

</style>