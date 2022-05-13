<template>
  <div>
    <h1>Hello</h1>
    <Suspense>
      <template #default>
        <SkeletonAnimation/>
      </template>
      <template #fallback>
        loading...
      </template>
    </Suspense>
  </div>
</template>
<script>
import SkeletonAnimation from '@/components/SkeletonAnimation.vue'
export default {
  components: { SkeletonAnimation }
}
</script>

<style>

</style>