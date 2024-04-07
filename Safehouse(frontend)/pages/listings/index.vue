<template>
  <div class="">
    <div class="flex items-center justify-between">
      <h1 class="font-bold text-4xl">Listings</h1>
      <NuxtLink to="/listings/create" class="btn text-sm"
        >+ New Listing</NuxtLink
      >
    </div>

    <div class="overflow-x-auto shadow-md sm:rounded-lg mt-8">
      <table
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
      >
        <thead
          class="text-md text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr class="bg-white">
            <td class="px-6 py-4 text-[#BF9001]" colspan="4">All (7)</td>
          </tr>
          <tr>
            <td class="py-4 px-2">
              <input type="checkbox" name="" class="shadow-md" id="" />
            </td>
            <th scope="col" class="px-6 py-3 font-medium">Name</th>
            <th scope="col" class="px-6 py-3 font-medium">Feature</th>

            <th scope="col" class="px-6 py-3 font-medium">Action</th>
          </tr>
        </thead>
        <tbody v-if="listings.length < 1 && loading">
          <tr>
            <td colspan="4" class="p-4">
              <center>
                <Spinner />
              </center>
            </td>
          </tr>
        </tbody>
        <tbody v-else>
          <tr v-show="listings.length < 1 && !loading">
            <td colspan="4" class="text-center text-md font-semibold p-4">
              No record
            </td>
          </tr>
          <tr
            v-for="listing in listings"
            :key="listing.id"
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
          >
            <td class="py-4 px-2">
              <input type="checkbox" name="" id="" />
            </td>
            <td scope="row" class="px-6 py-4">
              <p class="font-medium">
                {{ listing.property_type }}
              </p>
              <p>{{ listing.property_name }}</p>
              <p>Residential</p>
              <p>{{ listing.date_available }}</p>
            </td>
            <td class="px-6 py-4">
              <button type="button">
                <img
                  :src="require('~/static/images/switch-off.svg')"
                  alt="switch-off icon"
                />
              </button>
            </td>
            <td class="px-10 py-4">
              <button class="block overflow-hidden">
                <img
                  :src="require('~/static/images/list.png')"
                  role="button"
                  @click.prevent="
                    isOpen = !isOpen
                    uniqueId = listing.id
                  "
                  alt="list icon"
                  class=""
                />
              </button>

              <div
                v-if="isOpen && listing.id == uniqueId"
                class="bg-white py-2 absolute right-15 mt-5 w-36 shadow-xl b-7 border-gray-400 p-4 rounded-lg"
              >
                <a
                  href="/"
                  class="text-md py-2 px-2 rounded-md hover:text-white hover:bg-[#bf9001] font-medium block"
                  >View Listing</a
                >
                <a
                  href="/"
                  class="text-md py-2 px-2 rounded-md hover:text-white hover:bg-[#bf9001] font-medium block"
                  >Edit Listing</a
                >
                <a
                  href="/"
                  class="text-md py-2 px-2 rounded-md hover:text-white hover:bg-[#bf9001] font-medium block"
                  >Disable</a
                >
                <a
                  href="/"
                  class="text-md py-2 px-2 rounded-md hover:text-white hover:bg-[#bf9001] font-medium block"
                  >Delete</a
                >
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <span class="w-full border border-gray-200 flex"></span>
      <div
        class="md:flex md:justify-between items-center space-y-2 md:space-y-0 items-center p-2 bg-white"
      >
        <p class="font-medium text-sm">
          Showing {{ from }} to {{ to }} of {{ totalPages }} results
        </p>
        <div>
          <select
            v-model="newPerPage"
            @change="fetchListing"
            class="border border-gray-300 w-[50px] shadow p-1 rounded-lg"
          >
            <option v-for="n in totalPages" :key="n" :value="n">{{ n }}</option>
          </select>
          <span class="font-medium text-sm ml-2">per page</span>
        </div>
        <nav aria-label="Page navigation example">
          <ul class="flex items-center -space-x-px h-8 text-sm">
            <li v-if="currentPage > 1">
              <a
                href="#"
                @click.prevent="fetchListing(currentPage - 1)"
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
            <li v-for="page in pageNumbers" :key="page">
              <button
                @click.prevent="fetchListing(page)"
                :class="currentPage == page ? 'bg-[#bf9001] text-white' : ''"
                class="flex items-center hover:bg-[#bf9001] justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-[#BF9001] hover:text-white"
              >
                {{ page }}
              </button>
            </li>

            <li v-if="currentPage < totalPages">
              <a
                href="#"
                @click.prevent="fetchListing(currentPage + 1)"
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
      </div>
    </div>
  </div>
</template>

<script>
export default {
  head() {
    return {
      title: 'Safehouse - Listings',
    }
  },
  layout: 'admin',

  layout(context) {
    return 'admin'
  },
  data() {
    return {
      listings: [],
      isOpen: false,
      uniqueId: '',
      totalPages: '',
      perPage: '',
      currentPage: 1,
      firstPageUrl: '',
      lastPageUrl: '',
      nextPageUrl: '',
      links: [],
      from: '',
      to: '',
      newPerPage: 10,
      loading: true,
    }
  },

  methods: {
    async fetchListing(page = 1) {
      const response = await this.$axios.get(
        `/listings?page=${page}&perPage=${this.newPerPage}`,
        {
          headers: {
            'Content-Type': 'application/api',
          },
        }
      )

      if (response.status === 200) {
        this.loading = false
        this.listings = response.data.data
        console.log(response.data)
        this.currentPage = response.data.current_page
        this.totalPages = response.data.total
        this.perPage = response.data.per_page
        this.firstPageUrl = response.data.first_page_url
        this.lastPageUrl = response.data.last_page_url
        this.nextPageUrl = response.data.next_page_url
        this.from = response.data.from
        this.to = response.data.to
        this.links.push(response.data.links)
      }
    },
  },

  async mounted() {
    this.fetchListing()
  },

  computed: {
    pageNumbers() {
      const range = Math.ceil(this.totalPages / 5)
      let start = Math.max(1, this.currentPage - Math.floor(range / 2))
      const end = Math.min(this.totalPages, start + range - 1)
      return Array(end - start + 1)
        .fill(0)
        .map((_, i) => start + i)
    },
  },
}
</script>

<style scoped></style>
