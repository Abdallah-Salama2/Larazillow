<template>
  <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
    <Box class="md:col-span-7 flex items-center w-full">
      <div v-if="listing.images.length" class="grid grid-cols-1 gap-1">
        <img
          v-for="image in listing.images" :key="image.id"
          :src="image.src"
        />
      </div>
      <div v-else class="w-full text-center font-medium text-gray-500">No images</div>
    </Box>
    <div class="md:col-span-5 flex flex-col gap-4">
      <Box>
        <template #header>
          Basic info
        </template>
        <Price :price="listing.price" class="text-2xl font-bold" /> &nbsp;
        <ListingSpace :listing="listing" class="text-lg" />
        <ListingAddress :listing="listing" class="text-gray-500" />
      </Box>

      <Box>
        <template #header>
          Montly Payment
        </template>
        <div>
          <label class="label">Interest Rate({{ interstRate }}}%)</label>

          <input v-model.numer="interstRate" type="range" min="0.1" max="30" step="0.1" class="w-full h-4 rounded-lg bg-gray-200 appearance-none cursor-pointer dark:bg-gray-700" />
          <label class="label">Duration ({{ duration }} years)</label>
          <input v-model.numer="duration" type="range" min="3" max="35" step="1" class="w-full h-4 rounded-lg bg-gray-200 appearance-none cursor-pointer dark:bg-gray-700" />
        </div>

        <div class="text-gray-600 dark:text-gray-300 mt-2">
          <div class="text-gray 400">Your montly Payment</div>
          <Price :price="monthlyPayment" class="text-3xl" />

          <div class="mt-2 text-gray-500">
            <div class="flex justify-between">
              <div>Total paid</div>
              <div>
                <Price :price="totalPaid" class="font-medium" />
              </div>
            </div>
            <div class="flex justify-between">
              <div>Principal paid</div>
              <div>
                <Price :price="listing.price" class="font-medium" />
              </div>
            </div>
            <div class="flex justify-between">
              <div>Interest paid</div>
              <div>
                <Price :price="totalInterest" class="font-medium" />
              </div>
            </div>
          </div>
        </div>
      </Box>
      <MakeOffer :listing-id="listing.id" :price="listing.price" />
    </div>
  </div>
</template>

<script setup>

//since we are passing data to it we need to define props
// in controller we are passing listing to be showed in this page using show method

import ListingAddress from '@/Components/Listing/ListingAddress.vue'
import Price from '@/Components/Price.vue'
import Box from '@/Components/UI/Box.vue'
import { ref  } from 'vue'
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment.js'
import MakeOffer from '@/Components/Listing/MakeOffer.vue' //we use ref for reactive items like timer
const interestRate = ref(2.5)
const duration = ref(25)
const props = defineProps({
  listing: Object,
})

const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(
  props.listing.price, interestRate, duration,
)
</script>
