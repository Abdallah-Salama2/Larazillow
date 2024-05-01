<template>
  <span>{{ formattedPrice }}</span>
<!--  We Passed at prop not slot so to be able to modify past value before rendering it as a prop -->
</template>

<script setup>
import { computed } from 'vue'

const props=defineProps({
  price: [Number, String], //Can Be number or string
})
const formattedPrice = computed(()=> Number(props.price).toLocaleString('en-US', {
  style: 'currency',
  currency: 'EGP',
  maximumFractionDigits: 0,
}))
</script>
