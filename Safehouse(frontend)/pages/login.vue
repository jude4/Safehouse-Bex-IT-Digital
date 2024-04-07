<template>
  <div class="card md:w-[597px] sm:w-[331px] mx-auto md:px-[60px] sm:px-10">
    <img
      :src="require('~/static/images/logo1.png')"
      class="mx-auto py-5 hidden md:block"
      alt="logo"
    />
    <img
      :src="require('~/static/images/logo2.png')"
      class="mx-auto py-5 sm:visble md:hidden"
      alt="logo"
    />
    <h1 class="text-center font-semibold text-4xl">Log in</h1>
    <div v-show="errors" class="mt-3">
      <p class="font-semibold text-red-500 text-lg">Oops</p>
      <span class="my-4 text-red-500">
        {{ errors }}
      </span>
    </div>
    <form @submit.prevent="login" class="mt-8">
      <div class="">
        <label class="">Email</label>
        <input
          class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
          v-model="user.email"
          type="email"
          name="email"
          required
        />
      </div>

      <div class="mt-4">
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
          required
          class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
        />
      </div>

      <div class="my-3 flex justify-center">
        <NuxtLink to="/" class="font-semibold underline"
          >Forgot Password</NuxtLink
        >
      </div>

      <div class="flex items-center mt-10">
        <input type="checkbox" v-model="user.rememberToken" class="mr-2" />
        <p>Remember me</p>
      </div>

      <div class="mt-16 flex justify-center">
        <button
          type="submit"
          :disabled="processing"
          class="bg-[#B5B6B7] rounded-lg p-2 text-white w-[344px]"
        >
          <span v-if="processing" class="flex justify-center mx-auto">
            <Spinner />
          </span>
          <span v-else> Log in </span>
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  head() {
    return {
      title: 'Safehouse - Log in',
    }
  },
  auth: false,
  layout: 'auth',

  layout(context) {
    return 'auth'
  },

  data() {
    return {
      user: {
        email: '',
        password: '',
        rememberToken: '',
      },
      showPassword: false,
      errors: '',
      processing: false,
      successMessage: '',
    }
  },

  methods: {
    togglePassword() {
      this.showPassword = !this.showPassword
    },

    async login() {
      try {
        this.processing = true
        const response = await this.$auth.loginWith('laravelSanctum', {
          data: this.user,
        })

        if (response.status == 200) {
          this.processing = false
          this.successMessage = 'Login successful'
          setTimeout(() => {
            this.successMessage = ''
          }, 2000)
          await this.$router.push('/listings')
        } else {
          this.errors = response.message
        }
      } catch (e) {
        this.processing = false
        this.errors = e.response.data.message
        setTimeout(() => {
          this.errors = ''
        }, 3000)
      }
    },
  },
}
</script>

<style scoped></style>
