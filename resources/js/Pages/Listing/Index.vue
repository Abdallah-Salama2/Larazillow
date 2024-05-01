<template>
  <Filters :filters="filters" />
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
    <Listing
      v-for="$listing in listings.data" :key="$listing.id" :listing="$listing"
    />
  </div>
  <div v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
    <Pagination :links="listings.links" />
  </div>
</template>

<script setup>

import Listing from '@/Components/Listing/Listing.vue'
import Pagination from '@/Components/Pagination.vue'
import Filters from '@/Components/Filters.vue'


defineProps({
  listings: Object,
  // listing:Object,
  filters: Object,


})
</script>
