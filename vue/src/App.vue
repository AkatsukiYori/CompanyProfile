<template>
  <div>
    <router-view />
  </div>
</template>
<script>
export default{
  
}
</script>
<style>
::-webkit-scrollbar {
  width: 16px;
}

::-webkit-scrollbar-track {
  background: white; 
}

::-webkit-scrollbar-thumb {
  background: #7e22ce;
}

::-webkit-scrollbar-thumb:hover {
  background: #581c87; 
}

html, body {
  overflow-x: hidden;
}
body {
  position: relative
}
</style>