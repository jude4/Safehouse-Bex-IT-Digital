<template>
  <div>
    <header class="shadow-sm bg-white">
      <nav class="container mx-auto p-4 flex justify-between items-center">
        <div class="flex items-center">
          <div class="w-[257px]">
            <NuxtLink to="/" class="font-bold">
              <img
                :src="require('~/static/images/logo2.png')"
                alt="logo"
                class="w-[78px] h-[39px]"
              />
            </NuxtLink>
          </div>
          <!-- <div class="w-full flex-grow-0 border-b-2 border-[#BF9001]"></div> -->
          <div class="md:flex items-center hidden">
            <p class="font-semibold mr-4">Admin Pannel</p>
            <img
              :src="require('~/static/images/Separator.png')"
              alt="separator"
            />
            <p class="text-gray-400 ml-4">Listings</p>
          </div>
        </div>

        <div class="bg-gray-900 py-2 px-2 rounded-full">
          <span class="text-center font-semibold text-2xl text-white">DU</span>
        </div>
        <div class="sm:hidden">
          <button type="button">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="14"
              viewBox="0 0 16 14"
              fill="none"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M0 1C0 0.447715 0.447715 0 1 0H15C15.5523 0 16 0.447715 16 1C16 1.55228 15.5523 2 15 2H1C0.447715 2 0 1.55228 0 1ZM0 7C0 6.44772 0.447715 6 1 6H15C15.5523 6 16 6.44772 16 7C16 7.55228 15.5523 8 15 8H1C0.447715 8 0 7.55228 0 7ZM1 12C0.447715 12 0 12.4477 0 13C0 13.5523 0.447715 14 1 14H15C15.5523 14 16 13.5523 16 13C16 12.4477 15.5523 12 15 12H1Z"
                fill="#1C212B"
              />
            </svg>
          </button>
        </div>
      </nav>
    </header>
    <div class="container flex">
      <SideNav />
      <div class="container flex-1 p-4">
        <Nuxt />
      </div>
    </div>
  </div>
</template>

<script></script>

<style scoped></style>
