  <template>
    <div>
      <h1>Hello</h1>
      <SkeletonAnimation/>
      <!-- <div v-if="errMsg">{{ errMsg }}</div>
      <Suspense v-else>
        <template #default>
          <SkeletonAnimation/>
        </template>
        <template #fallback>
          loading...
        </template>
      </Suspense> -->
    </div>
  </template>
  <script>
  import SkeletonAnimation from '@/components/SkeletonAnimation.vue'
  import { ref,onErrorCaptured } from 'vue';
  export default {
    components: { SkeletonAnimation },
    setup(){
      const errMsg = ref(null)
      
      onErrorCaptured(e => {
        errMsg.value = 'error'
        return true
      })
      
      return { errMsg }
    }
  }
  </script>

  <style>

  </style>