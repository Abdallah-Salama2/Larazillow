<template>
  <!--    To use anyComponent in template we add like Html tag-->
  <!--    We Name Component BascalCase-->
  <div>
    Index
  </div>
  <Link href="/hello">ShowPage</Link>
  <div>
    The message is {{ message }}
  </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
// defineProps(['message'])//to show the message at index at controller to render it show in template above
//all ur props should be camelCase
defineProps({ //better Practice
  message: String,
})

</script>

<!--<script>-->
<!--import MainLayout from "@/Layouts/MainLayout.vue";-->
<!--// When We  do this timer wont reset when we visit different Pages-->
<!--export default {-->
<!--    layout:MainLayout-->
<!--}-->
<!--</script>-->
