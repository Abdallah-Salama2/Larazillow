<template>
  <div>
    <span class="font-bold">{{ listing.beds }} </span> bds <span class="text-gray-350 dark:text-blue-200"> | </span>
    <span class="font-bold">{{ listing.baths }} </span> ba <span class="text-gray-350 dark:text-blue-200"> | </span>
    <span class="font-bold">{{ listing.area }} </span> m²
  </div>

<!--  we use span in small edits like this cuz its an inline element i wont take the whole space like div element-->
</template>

<script setup>

//since we are passing data to it we need to define props
// in controller we are passing listing to be showed in this page using show method

defineProps({
  listing: Object,

})
</script>
