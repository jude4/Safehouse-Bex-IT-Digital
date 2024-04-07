<template>
  <input
    :type="inputType"
    :name="name"
    :placeholder="placeholder"
    class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
  />
</template>

<script setup>
defineProps({
  inputType: {
    type: String,
    default: "text",
  },
  name: {
    type: String,
  },
  placeholder: {
    type: String,
  },
});
</script>
