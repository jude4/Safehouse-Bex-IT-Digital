<template>
  <div class="card md:w-[597px] sm:w-[331px] mx-auto md:px-[60px] sm:px-10">
    <img
      :src="require('~/static/images/logo1.png')"
      class="mx-auto py-5 hidden md:block"
      alt="logo"
    />
    <img
      :src="require('/static/images/logo2.png')"
      class="mx-auto py-5 sm:visble md:hidden"
      alt="logo"
    />
    <h1 class="text-center font-semibold text-4xl">Sign up</h1>
    <div class="my-2 mx-auto" v-if="successMessage">
      <p
        class="bg-green-200 text-green-900 text-center rounded-lg p-4 text-md font-medium"
      >
        {{ successMessage }}
      </p>
    </div>
    <form class="mt-4" @submit.prevent="register">
      <div class="">
        <label class="">First Name</label>
        <input
          type="text"
          name="first_name"
          v-model="user.first_name"
          class="p-3 w-full border border-[#666666] rounded-xl mt-2"
        />
        <em class="text-red-500 text-sm" v-if="errors.first_name">{{
          errors.first_name[0]
        }}</em>
      </div>
      <div class="mt-2">
        <label class="">Last Name</label>
        <input
          type="text"
          name="last_name"
          v-model="user.last_name"
          class="p-3 w-full border border-[#666666] rounded-xl mt-2"
        />
        <em class="text-red-500 text-sm" v-if="errors.last_name">{{
          errors.last_name[0]
        }}</em>
      </div>
      <div class="mt-2">
        <label class="">Email</label>
        <input
          type="email"
          v-model="user.email"
          class="p-3 w-full border border-[#666666] rounded-xl mt-2"
        />
        <em class="text-red-500 text-sm" v-if="errors.email">{{
          errors.email[0]
        }}</em>
      </div>

      <div class="mt-2">
        <div class="flex justify-between items-center">
          <label class="">Password</label>
          <div class="flex items-center space-x-2">
            <i
              class="fas fa-eye"
              v-show="showPassword"
              @click.prevent="togglePassword"
              role="button"
            ></i>
            <i
              class="fas fa-eye-slash"
              v-show="!showPassword"
              @click.prevent="togglePassword"
              role="button"
            ></i>
            <span v-show="showPassword" class="flex justify-end text-sm"
              >Hide</span
            >
            <span v-show="!showPassword" class="flex justify-end text-sm"
              >Show</span
            >
          </div>
        </div>
        <input
          :type="showPassword ? 'text' : 'password'"
          name="password"
          v-model="user.password"
          class="p-3 w-full border border-[#666666] rounded-xl mt-2"
        />
        <em class="text-red-500 text-sm" v-if="errors.password">{{
          errors.password[0]
        }}</em>
      </div>

      <div class="my-2 flex justify-center">
        <NuxtLink to="/" class="font-semibold underline"
          >Forgot Password</NuxtLink
        >
      </div>

      <div class="flex items-center mt-2">
        <input type="checkbox" v-model="user.rememberToken" class="mr-2" />
        <p>Remember me</p>
      </div>

      <div class="mt-4 flex justify-center">
        <button
          type="submit"
          :disabled="processing"
          class="bg-[#B5B6B7] rounded-lg p-2 text-white w-[344px]"
        >
          <span v-if="processing" class="mx-auto justify-center flex">
            <Spinner />
          </span>
          <span v-else> Sign up </span>
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  head() {
    return {
      title: 'Safehouse - Sign up',
    }
  },
  auth: false,
  layout: 'auth',

  layout(context) {
    return 'auth'
  },

  data() {
    return {
      showPassword: false,
      user: {
        first_name: '',
        last_name: '',
        email: '',
        password: '',
        rememberToken: '',
      },
      processing: false,
      errors: [],
      successMessage: '',
    }
  },
  methods: {
    togglePassword() {
      this.showPassword = !this.showPassword
    },

    async register() {
      try {
        this.processing = true

        const response = await this.$axios.post('/register', this.user)

        if (response.status == 200) {
          this.processing = false
          this.user = {
            first_name: '',
            last_name: '',
            email: '',
            password: '',
            rememberToken: '',
          }

          this.successMessage = response.data.message

          setTimeout(() => {
            this.successMessage = ''
            this.$router.push('/login')
          }, 3000)
        }
      } catch (e) {
        console.error(e)
        this.errors = e.response.data.errors
        setTimeout(() => {
          this.errors = []
        }, 5000)
      }
    },
  },
}
</script>

<style scoped></style>
