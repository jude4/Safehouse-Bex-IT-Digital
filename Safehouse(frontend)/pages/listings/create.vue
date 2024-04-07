<template>
  <div>
    <h1 class="font-bold text-4xl">Listing</h1>

    <div class="card mt-7 p-4 px-7">
      <h1 class="font-medium text-xl">Listings Description</h1>

      <form class="mt-5" @submit.prevent="createListing">
        <div class="grid md:grid-cols-2 gap-5">
          <div class="mt-7">
            <label for="property_name" class="text-sm font-medium"
              >Property Name</label
            >
            <input
              placeholder="Title (mandatory)"
              text="text"
              required
              v-model="listing.property_name"
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
            />
          </div>
          <div class="mt-7">
            <label for="property_name" class="text-sm font-medium"
              >Property Type</label
            >
            <TextInput
              placeholder="Example: Residential, Commercial.."
              type="text"
              required
              v-model="listing.property_type"
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
            />
          </div>
          <div class="mt-7">
            <label for="property_name" class="text-sm font-medium">Units</label>
            <input
              placeholder="Example: Villa, Apartment..."
              type="text"
              required
              v-model="listing.property_unit"
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
            />
          </div>
          <div class="mt-7">
            <label for="property_name" class="text-sm font-medium"
              >Property Address</label
            >
            <input
              required
              placeholder="Example: Villa, Apartment..."
              type="text"
              v-model="listing.property_address"
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
            />
          </div>
        </div>
        <div class="mt-7">
          <label for="property_name" class="text-sm font-medium"
            >About this property</label
          >
          <textarea
            rows="5"
            placeholder="Description"
            v-model="listing.about_property"
            class="w-full border border-gray-300 p-3 rounded-lg mt-2"
          ></textarea>
        </div>

        <div class="grid md:grid-cols-3 gap-5 mt-5">
          <div>
            <label for="" class="text-sm">Listing Type</label>
            <select
              v-model="listing.type"
              class="border border-gray-300 rounded-lg p-3 w-full mt-2"
            >
              <option value="">Select option</option>
            </select>
          </div>
          <div>
            <label for="" class="text-sm">Property Price</label>
            <input
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
              type="number"
              v-model="listing.property_price"
              placeholder="0.00"
              required
            />
          </div>
          <div>
            <label for="" class="text-sm">Payment Type</label>
            <select
              v-model="listing.payment_type"
              class="border border-gray-300 rounded-lg p-3 w-full mt-2"
            >
              <option value="">Select option</option>
            </select>
          </div>
        </div>

        <h1 class="font-medium text-xl mt-7">Listings Media</h1>

        <div class="mt-5 md:grid grid-cols-2 gap-5">
          <div>
            <label for="" class="font-medium text-sm"
              >Property images
              <img
                :src="require('~/static/images/icon.png')"
                alt="info icon"
                class="inline-flex"
            /></label>
            <input
              type="file"
              style="display: none"
              @change="handleFileChange"
              id="propertyMedia"
              multiple
              accept="image/*"
            />
            <button
              @click="openFile"
              class="w-full border border-gray-300 rounded-lg p-3 py-3 mt-2 text-md"
            >
              Drag & Drop your files or <span class="underline">Browse</span>
            </button>
            <div
              class="grid grid-cols-3 gap-4 mt-5"
              v-if="listing.image_path.length > 0"
            >
              <img
                v-for="(media, index) in listing.image_path"
                :key="index"
                :src="media"
                alt="image upload"
              />
            </div>
          </div>
          <div>
            <label for="" class="font-medium text-sm"
              >Property video
              <img
                :src="require('~/static/images/icon.png')"
                alt="info icon"
                class="inline-flex"
            /></label>
            <input
              type="text"
              v-model="listing.property_video"
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
              placeholder="Example: Villa, Apartment.."
            />
            <div class="mt-5">
              <img
                :src="require('~/static/images/video.png')"
                alt="video upload"
              />
            </div>
          </div>
        </div>

        <h1 class="font-medium text-xl mt-7">Listings Details</h1>

        <div class="mt-5 md:grid grid-cols-3 gap-5">
          <div>
            <label for="" class="text-sm">Bedroom</label>
            <input
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
              type="text"
              v-model="listing.bedroom"
              placeholder="eg. 3"
            />
          </div>
          <div>
            <label for="" class="text-sm">Bathroom</label>
            <input
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
              type="text"
              v-model="listing.bathroom"
              placeholder="Paste in video link"
            />
          </div>
          <div>
            <label for="" class="text-sm">Square Area</label>
            <input
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
              type="text"
              v-model="listing.square_area"
              placeholder="Paste in video link"
            />
          </div>
        </div>

        <div class="grid md:grid-cols-2 mt-4 gap-5">
          <div>
            <label for="" class="text-sm">Status</label>
            <input
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
              placeholder="Paste in video link"
              v-model="listing.status"
            />
          </div>
          <div>
            <label for="" class="text-sm">City</label>
            <input
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
              placeholder="Paste in video link"
              v-model="listing.city"
            />
          </div>
          <div>
            <label for="" class="text-sm">Date Available</label>
            <input
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
              placeholder="Paste in video link"
              v-model="listing.date_available"
            />
          </div>
          <div>
            <label for="" class="text-sm">Year Built</label>
            <input
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
              placeholder="Paste in video link"
              v-model="listing.year_built"
            />
          </div>
          <div>
            <label for="" class="text-sm">Laundry</label>
            <input
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
              placeholder="Paste in video link"
            />
          </div>
          <div>
            <label for="" class="text-sm">Size</label>
            <input
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
              placeholder="Paste in video link"
              v-model="listing.size"
            />
          </div>
          <div>
            <label for="" class="text-sm">Cooling</label>
            <input
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
              placeholder="Paste in video link"
              v-model="listing.cooling"
            />
          </div>
          <div>
            <label for="" class="text-sm">Lot Size</label>
            <input
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
              placeholder="Paste in video link"
              v-model="listing.lot_size"
            />
          </div>
          <div>
            <label for="" class="text-sm">Heating</label>
            <input
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
              placeholder="Paste in video link"
              v-model="listing.heating"
            />
          </div>
          <div>
            <label for="" class="text-sm">Parking Area</label>
            <input
              class="p-3 w-full border border-gray-300 focus:border-0 rounded-xl mt-2"
              placeholder="Paste in video link"
            />
          </div>
        </div>

        <h1 class="font-medium text-xl mt-7">Amenities Features</h1>

        <div class="border border-gray-300 mt-4 rounded-lg">
          <div class="p-4">
            <NuxtLink to="/admin/listings/create" class="text-sm btn"
              >+ Create new amenities</NuxtLink
            >
          </div>
          <span class="flex w-full border border-gray-300 mt-2"></span>
          <div class="p-4">
            <input
              type="text"
              @keypress="manageKeyPress"
              class="border border-gray-300 flex-grow outline-none rounded-lg px-3 py-1 w-full"
              placeholder="Search Amenities"
              v-model="newTag"
            />

            <div
              class="bg-gray-100 p-2 rounded-lg md:flex md:space-x-5 md:items-center mt-2"
            >
              <p
                v-for="(feature, index) in listing.amenitity_features"
                :key="feature"
                class="bg-gray-200 p-1 px-2 rounded-lg text-xs font-semibold"
              >
                {{ feature }}
                <button @click.prevent="removeTag(index)" class="font-semibold">
                  X
                </button>
              </p>
              <p class="bg-gray-200 p-1 px-2 rounded-lg text-xs font-semibold">
                + 12 others
              </p>
            </div>
          </div>
        </div>

        <div class="mt-7 space-x-5 flex">
          <button class="border border-gray-300 rounded-lg p-2 w-[214px]">
            Cancel
          </button>
          <button
            :disabled="processing"
            class="rounded-lg border bg-[#BF9001] text-white px-5 w-[214px] p-2"
          >
            <span v-if="processing" class="mx-auto flex justify-center">
              <Spinner class="text-white fill-current" />
            </span>

            <span v-else> Upload Listing </span>
          </button>
          <span
            v-if="success"
            class="p-4 rounded-lg text-green-900 bg-green-200"
            >{{ success }}</span
          >
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  layout: 'admin',

  layout(context) {
    return 'admin'
  },
  data() {
    return {
      success: '',
      listing: {
        bedroom: '',
        bathroom: '',
        square_areas: '',
        status: '',
        city: '',
        date_available: '',
        year_built: '',
        property_name: '',
        property_type: '',
        units: '',
        property_address: '',
        about_property: '',
        listing_type: '',
        property_price: '',
        payment_type: '',
        laundry: '',
        cooling: '',
        size: '',
        lot_size: '',
        heating: '',
        parking_area: '',
        amenitity_features: [],
        image_path: [],
      },
      errors: [],
      amenitiesFeatures: [
        'Equipped Kitchen',
        'Media Room',
        'Basketball',
        'Hot Bath',
        'Washer and dryer',
      ],

      newTag: '',
      processing: false,
    }
  },

  methods: {
    async createListing() {
      try {
        this.processing = true

        const response = await this.$axios.post('/listings', this.listing)

        console.log(response)
        this.processing = false
        this.success = response.data.message
        this.listing = {
          bedroom: '',
          bathroom: '',
          square_areas: '',
          status: '',
          city: '',
          date_available: '',
          year_built: '',
          property_name: '',
          property_type: '',
          units: '',
          property_address: '',
          about_property: '',
          listing_type: '',
          property_price: '',
          payment_type: '',
          laundry: '',
          cooling: '',
          size: '',
          lot_size: '',
          heating: '',
          parking_area: '',
          amenitity_features: [],
          image_path: [],
        }
        setTimeout(() => {
          this.success = ''
        }, 5000)
      } catch (e) {
        console.error(e)
        this.errors = e.response.data.errors
      }
    },

    addTag() {
      if (this.newTag.trim() != '') {
        this.listing.amenitity_features.push(this.newTag.trim())

        this.newTag = ''
      }
    },

    manageKeyPress(e) {
      if (e.key === 'Enter' || e.key === ' ') this.addTag()
      else if (e.key === 'Backspace') this.removeTag()
    },

    removeTag(index) {
      this.listing.amenitity_features.splice(index, 1)
    },

    openFile() {
      this.listing.image_path = []

      const propertyMedia = document.getElementById('propertyMedia')
      propertyMedia.click()
    },

    handleFileChange(e) {
      const files = e.target.files

      if (files.length > 3) {
        alert('You are only allow to upload 3 property photo')

        event.target.value = null
        return
      }
      for (let i = 0; i < files.length; i++) {
        const reader = new FileReader()
        const file = files[i]

        reader.onload = (e) => {
          this.listing.image_path.push(e.target.result)
        }
        console.log(file)
        reader.readAsDataURL(file)
      }
    },
  },
}
</script>

<style scoped></style>
