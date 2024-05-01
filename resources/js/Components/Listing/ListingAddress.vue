<template>
  <span> {{ listing.street }}{{ listing.street_nr }} in {{ listing.city }}</span>
</template>

<script setup>

//since we are passing data to it we need to define props
// in controller we are passing listing to be showed in this page using show method

defineProps({
  listing: Object,

})
</script>
