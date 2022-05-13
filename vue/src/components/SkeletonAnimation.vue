<template>
  <div class="profile-card">
      <div class="profile-img">
          <img src="@/assets/logo.png" alt="">
      </div>
      <div v-for="user in userData">
          <h3>{{ user.name }}</h3>
          <h3>{{ user.division }}</h3>
      </div>
  </div>
</template>

<script>
import axios from 'axios';

async function coba(){
    const varCoba = [];
    axios.get('getCarouselKaryawan')
        .then(res => {
            varCoba = res.data
        })
        .catch(err => {
            console.log(err.message)
        })
        
    return {varCoba}
}

export default {
    async setup() {
        const userData = await coba();
        
        return {
            userData
        }
    }
    // data() {
    //     return {
    //         userData: {
    //             name: "ok",
    //             bio: "tidak"
    //         }
    //     }
    // },
}
</script>

<style>

</style>