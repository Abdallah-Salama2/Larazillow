<template>
  <!--    So Now every Page Has MainLayput Compononet Has same Header-->

  <!--    <MainLayout>-->
  <!--    And if We add it down using export in script we dont neeed to add it here in template-->
  <!--        The Content Inside Main Layout Tags here will be rendered in place of Slot in MainLayout.vue code-->
  <div>
    show
  </div>
  <Link href="/">MainPage</Link>
</template>
<script setup>
import {Link} from '@inertiajs/vue3'
</script>

<!--Now We can remove this Script Cuz We add it As default Layout in app.js-->
<!--<script>-->
<!--import MainLayout from "@/Layouts/MainLayout.vue";-->

<!--export default {-->
<!--    layout:MainLayout-->
<!--}-->
<!--</script>-->
