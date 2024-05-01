<template>
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
    <!--  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4"> if small screen then one list if medium screen 2 if xlarge screen then 3-->
    <!--    directive for looping & using key is the best practice that prevent errors both of them are vue directives-->
    <!--    <div v-for="listing in listings" :key="listing.id">-->
    <!--    <Box v-for="listing in listings" :key="listing.id">-->
    <!--      &lt;!&ndash;      <Link :href="`/listing/${listing.id}`">&ndash;&gt;-->
    <!--      &lt;!&ndash;        <ListingAddress :listing="listing" />&ndash;&gt;-->
    <!--      &lt;!&ndash;      {{ listing.street }}{{ listing.street_nr }}-&#45;&#45;{{ listing.city }}-&#45;&#45;${{ listing.price }}&ndash;&gt;-->
    <!--      &lt;!&ndash;      </Link>&ndash;&gt;-->
    <!--      <div>-->
    <!--        &lt;!&ndash;        <Link :href="`/listing/${listing.id}`">&ndash;&gt;-->
    <!--        <Link :href="route('listing.show', {listing: listing.id})">-->
    <!--          <Price :price="listing.price" class="text-2xl font-bold" />-->
    <!--          &lt;!&ndash;            :price aw :listing ele byb2o ba3d : deh dol props ele b3rfhom fe component&ndash;&gt;-->
    <!--          <LisitngSpace :listing="listing" class="text-lg text-gray dark:text-blue-200" />-->
    <!--          <ListingAddress :listing="listing" class="text-gray-500 dark:text-white-600" />-->
    <!--        </Link>-->
    <!--      </div>-->
    <!--      <div>-->
    <!--        &lt;!&ndash;        <Link :href="`/listing/${listing.id}/edit`">Edit</Link>&ndash;&gt;-->
    <!--        <Link :href="route('listing.edit', {listing: listing.id})">Edit</Link>-->
    <!--      </div>-->
    <!--      <div>-->
    <!--        &lt;!&ndash;        <Link :href="`/listing/${listing.id}`" method="DELETE" as="button">Delete</Link>&ndash;&gt;-->
    <!--        <Link :href="route('listing.destroy', {listing: listing.id})" method="DELETE" as="button">Delete</Link>-->
    <!--      </div>-->
    <!--    </Box>-->
    <Listing
      v-for="listing in listings" :key="listing.id" :listing="listing"
    />
  </div>
</template>

<script setup>
import ListingAddress from '@/Components/Listing/ListingAddress.vue'
import LisitngSpace from '@/Components/Listing/LisitngSpace.vue'
import { Link } from '@inertiajs/vue3'
import Box from '@/Components/UI/Box.vue'
import Price from '@/Components/Price.vue'
import Listing from '@/Components/Listing/Listing.vue'

//since we are passing data to it we need to define props
// in controller we are passing listings to be showed in this page using index method

defineProps({
  listings: Array,
  listing:Object,

})
</script>
