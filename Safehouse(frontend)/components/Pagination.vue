<template>
  <nav aria-label="Page navigation example">
    <ul class="flex items-center -space-x-px h-8 text-sm">
      <li v-if="currentPage > 1">
        <a
          href="#"
          @click.prevent="changePage(currentPage - 1)"
          class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-[#BF9001] bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
        >
          <span class="sr-only">Previous</span>
          <svg
            class="w-2.5 h-2.5 rtl:rotate-180"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 6 10"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M5 1 1 5l4 4"
            />
          </svg>
        </a>
      </li>
      <li v-for="page in pages" :key="page">
        <a
          href="#"
          @click.prevent="changePage(page)"
          class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-[#BF9001] hover:bg-gray-100 hover:text-gray-700"
          >{{ page }}</a
        >
      </li>
    
      <li v-if="currentPage < totalPages">
        <a
          href="#"
          @click.prevent="changePage(currentPage + 1)"
          class="flex items-center justify-center px-3 h-8 leading-tight text-[#BF9001] bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
        >
          <span class="sr-only">Next</span>
          <svg
            class="w-2.5 h-2.5 rtl:rotate-180"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 6 10"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="m1 9 4-4-4-4"
            />
          </svg>
        </a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  props: {
    currentPage: {
      type: Number,
      default: 1,
    },
    totalPages: {
      type: Number,
      required: true,
    },

    data() {
      return {
        pages: this.pageNumbers(this.currentPage),
      }
    },

    mounted() {
      this.pageNumbers(this.currentPage)
    },

    // computed: {},

    methods: {
      changePage(page) {
        this.$emit('update:currentPage', page)
      },

      pageNumbers() {
        const range = Math.ceil(this.totalPages / 5)
        let start = Math.max(1, this.currentPage - Math.floor(range / 2))
        const end = Math.min(this.totalPages, start + range - 1)
        return Array(end - start + 1)
          .fill(0)
          .map((_, i) => start + i)
      },
    },
  },
}
</script>

<style scoped></style>
