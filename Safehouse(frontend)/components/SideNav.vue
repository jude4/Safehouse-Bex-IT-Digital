<template>
  <nav class="hidden md:block bg-white w-[257px] h-screen">
    <ul class="mt-8 pl-10">
      <li>
        <NuxtLink to="/" class="flex items-center mx-2">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            viewBox="0 0 20 20"
            fill="none"
          >
            <rect
              x="3.33325"
              y="3.3335"
              width="5"
              height="5.83333"
              rx="1"
              stroke="#1C212B"
              stroke-linejoin="round"
            />
            <rect
              x="3.33325"
              y="12.5"
              width="5"
              height="4.16667"
              rx="1"
              stroke="#1C212B"
              stroke-linejoin="round"
            />
            <rect
              x="11.6667"
              y="3.3335"
              width="5"
              height="4.16667"
              rx="1"
              stroke="#1C212B"
              stroke-linejoin="round"
            />
            <rect
              x="11.6667"
              y="10.8335"
              width="5"
              height="5.83333"
              rx="1"
              stroke="#1C212B"
              stroke-linejoin="round"
            />
          </svg>
          Dashboard
        </NuxtLink>
      </li>
      <span class="mt-8 flex border broder-gray-100 w-full"></span>
    </ul>
    <div class="mt-6 mr-4 pl-10">
      <ul class="">
        <p class="text-sm font-semibold">Admin Pannel</p>
        <li class="text-sm">
          <NuxtLink
            to="/listings"
            class="px-2 py-2 rounded-md w-full mt-4 flex justify-between items-center"
          >
            <span class="flex items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 20 20"
                fill="none"
              >
                <path
                  d="M4.58325 8.3335V14.2502C4.58325 15.193 4.58325 15.6644 4.87615 15.9573C5.16904 16.2502 5.64044 16.2502 6.58325 16.2502H13.4166C14.3594 16.2502 14.8308 16.2502 15.1237 15.9573C15.4166 15.6644 15.4166 15.193 15.4166 14.2502V8.3335"
                  stroke="white"
                />
                <path
                  d="M17.0834 9.5835L10.5768 4.99057C10.231 4.74652 9.76913 4.74652 9.4234 4.99057L2.91675 9.5835"
                  stroke="white"
                  stroke-linecap="round"
                />
                <path
                  d="M12.0834 15.8335V12.8335C12.0834 11.7289 11.188 10.8335 10.0834 10.8335H9.91675C8.81218 10.8335 7.91675 11.7289 7.91675 12.8335V15.8335"
                  stroke="white"
                  stroke-linejoin="round"
                />
                <path
                  d="M14.5833 7.50016V4.5835"
                  stroke="white"
                  stroke-linecap="round"
                />
              </svg>
              Listings
            </span>
            <small class="text-xs p-1 bg-white text-[#bf9001] rounded-full"
              >25</small
            >
          </NuxtLink>
        </li>
        <ul class="ml-4">
          <li class="mt-3 flex justify-between items-center">
            <NuxtLink to="/" class="font-semibold text-sm">
              <img
                :src="require('~/static/images/chat-mail.svg')"
                alt="chat-mail icon"
                class="inline-flex"
              />
              Call Requests</NuxtLink
            >
            <span class="bg-[#F7F4F2] rounded-full text-xs font-medium"
              >53</span
            >
          </li>
          <li class="mt-4 flex items-center justify-between">
            <NuxtLink to="/" class="font-semibold text-sm">
              <img
                :src="require('~/static/images/chat-square.svg')"
                alt="chat-square icon"
                class="inline-flex"
              />
              Reviews & Ratings</NuxtLink
            >
            <span class="bg-[#F7F4F2] rounded-full text-xs font-medium"
              >197</span
            >
          </li>
          <li class="mt-4">
            <NuxtLink to="/" class="font-semibold text-sm items-center flex">
              <img
                :src="require('~/static/images/house-heart.svg')"
                alt="house-heart icon"
                class="inline-flex mr-1"
              />Favourites
            </NuxtLink>
          </li>
          <li class="mt-4">
            <NuxtLink to="/" class="font-semibold text-sm flex items-center">
              <img
                :src="require('~/static/images/community.svg')"
                alt="community icon"
                class="inline-flex mr-1"
              />
              User Control</NuxtLink
            >
          </li>
          <li class="mt-4">
            <NuxtLink to="/" class="font-semibold text-sm flex items-center">
              <img
                :src="require('~/static/images/check-light.svg')"
                alt="check-light icon"
                class="inline-flex mr-1"
              />
              Admin</NuxtLink
            >
          </li>
        </ul>
        <span class="mt-6 flex border broder-gray-100 w-full"></span>
        <p class="text-sm font-semibold mt-4">Website Editor</p>

        <ul class="ml-4">
          <li class="mt-3">
            <NuxtLink to="/" class="font-semibold text-sm flex items-center">
              <img
                :src="require('~/static/images/check-light.svg')"
                alt="check-light icon"
                class="inline-flex mr-1"
              />
              Home</NuxtLink
            >
          </li>
          <li class="mt-4">
            <NuxtLink to="/" class="font-semibold text-sm flex items-center">
              <img
                :src="require('~/static/images/info.svg')"
                alt="info icon"
                class="inline-flex mr-1"
              />
              About</NuxtLink
            >
          </li>
          <li class="mt-4">
            <NuxtLink to="/" class="font-semibold text-sm flex items-center">
              <img
                :src="require('~/static/images/phone-light.svg')"
                alt="phone-light icon"
                class="inline-flex mr-1"
              />
              Contact</NuxtLink
            >
          </li>
          <li class="mt-4">
            <NuxtLink to="/" class="font-semibold text-sm flex items-center">
              <img
                :src="require('~/static/images/share-light.svg')"
                alt="share-light icon"
                class="inline-flex mr-1"
              />
              Socials</NuxtLink
            >
          </li>
          <li class="mt-4">
            <NuxtLink to="/" class="font-semibold text-sm flex items-center">
              <img
                :src="require('~/static/images/question-light.svg')"
                alt="question-light icon"
                class="inline-flex mr-1"
              />
              FAQ's</NuxtLink
            >
          </li>
        </ul>
        <span class="mt-6 flex border broder-gray-100 w-full"></span>
        <ul class="ml-3">
          <li class="mt-5">
            <button
              type="button"
              @click.prevent="logout"
              class="font-semibold text-sm flex items-center"
            >
              <img
                :src="require('~/static/images/logout.svg')"
                alt="logout icon"
                class="inline-flex mr-1"
              />
              Signout
            </button>
          </li>
        </ul>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  methods: {
    async logout() {
      try {
        await this.$auth.logout()

        this.$router.push('/login')
      } catch (e) {
        console.error(e)
      }
    },
  },
}
</script>

<style scoped>
.nuxt-link-exact-active {
  background: #bf9001;
  color: #fff;
}
</style>
