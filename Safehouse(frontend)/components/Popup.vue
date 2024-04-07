<template>
  <div
    v-show="show"
    class="fixed z-50 top-0 left-0 w-full h-full bg-gray-opacity-50 backdrop-blur-sm flex justify-center items-center"
  >
    <div class="bg-white rounded-lg shadow-md p-4">
      <p>This is the popup content.</p>
      <button @click="$emit('closePopup')">Close</button>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  show: {
    type: Boolean,
    default: false,
  },
});

const emitClosePopup = () => {
  $emit("closePopup");
};
</script>

<style scoped></style>
