<template>
  <Box>
    <div>
      <Link
        :href="route('listing.show', {listing: listing.id})"
      >
        <div class="flex items-center gap-1">
          <Price
            :price="listing.price"
            class="text-2xl font-bold"
          />
          <div class="text-xs text-gray-500">
            <Price :price="monthlyPayment" /> pm
          </div>
        </div>
        <ListingSpace2 :listing="listing" class="text-lg" />
        <ListingAddress
          :listing="listing"
          class="text-gray-500"
        />
      </Link>
    </div>
    <div />
  </Box>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import Box from '@/Components/UI/Box.vue'
import Price from '@/Components/Price.vue'
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment'
import ListingAddress from '@/Components/Listing/ListingAddress.vue'
import ListingSpace2 from '@/Components/Listing/LisitngSpace.vue'
import { route } from 'ziggy-js'
const props = defineProps({ listing: Object })
const { monthlyPayment } = useMonthlyPayment(
  props.listing.price, 2.5, 25,
)
</script>
