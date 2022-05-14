<template>
  <div class="profile-card">
      <!-- <div class="profile-img">
          <img src="@/assets/logo.png" alt="">
      </div>
      <div v-for="user in data">
          <h3>{{ user.name }}</h3>
      </div> -->
      <div v-if="errMsg">{{ errMsg }}</div>
      <Suspense>
          <template #default>
              <div v-for="user in data">
                <h3>{{ user.name }}</h3>
              </div>
          </template>
          <template #fallback>
              loading
          </template>
      </Suspense>
  </div>
</template>

<script>
import { ref, onErrorCaptured } from 'vue'
import axios from 'axios'

export default {
    setup(){
      const errMsg = ref(null);
      onErrorCaptured(e => {
          errMsg.value = "gagal";
          return true
      });
      
      return errMsg;
    },
    async setup () {
        const userData = await axios.get('getCarouselKaryawan')
        
        const data = userData.data
        console.log(data)
        
        return {
            data
        }
    }
}
</script>

<style>

</style>