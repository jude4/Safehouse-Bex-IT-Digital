<template>
  <div
    class="h-screen bg-cover bg-no-repeat main"
    :style="{
      'background-image': 'url(' + require('~/static/images/banner.png') + ')',
    }"
  >
    <div class="container flex justify-center items-center h-full py-3 mx-auto">
      <Nuxt />
    </div>
  </div>
</template>

<script setup>


</script>

<style scoped></style>
