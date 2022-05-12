<template>
  <div class = "main"><div class = "wrapper">,
        <img src="@/assets/logo.png" class="w-96 h-auto m-auto" alt="">
        <p class="text-5xl text-center">Page Not Found</p>
        <router-link :to="{ path: '/' }" href="#"
        class="block text-center py-2 pr-4 pl-3 border-b border-gray-300 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0 dark:text-gray-400 md:dark:hover:text-purple-600 dark:hover:bg-purple-600 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 lg:text-xl" @click="movescreen('home')"
        >
            Back to Home
        </router-link>
  </div></div>
</template>

<script>
export default {
    methods: {
    }
}
</script>

<style scoped>
html, body {
    height: 100%;
}
.main {
    height: 100%;
    width: 100%;
    display: table;
}
.wrapper {
    display: table-cell;
    height: 100%;
    vertical-align: middle;
    padding-top: 10% !important;
}
</style>