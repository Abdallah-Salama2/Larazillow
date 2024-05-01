<template>
  <!--    In the provided code snippet, &nbsp; is being used to add a non-breaking space-->
  <!--    between the text "MainPage" and the next element or text node. This ensures that even if there is a line break or-->
  <!--    space collapse, there will be a visible space between "MainPage" and the subsequent content-->
  <!--  <Link href="/">MainPage</Link>&nbsp;-->
  <!--  <Link href="/hello">ShowPage</Link>-->
  <!--  <Link>Listings</Link>&nbsp;-->
  <!--  <Link href="/listing/create">New Listing</Link>-->

  <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
    <div class="container mx-auto">
      <nav class="p-4 flex items-center justify-between ">
        <div class="text-lg font-medium">
          <Link :href="route('listing.index')">Listings</Link>
        </div>
        <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center mx-auto ">
          <Link :href="route('listing.index')">LaraZillow</Link>
        </div>
        <!--          to add more elements to this container make it flex it may need some style so we added items-center which will center it in this div container-->
        <div v-if="user" class="flex items-center gap-8">
          <Link :href="route('realtor.listing.create')" class="btn-primary">+ New Listing</Link>
          <Link
            class="text-lg-center text-gray-500 dark:text-indigo-300 w-20 font-semibold"
            :href="route('realtor.listing.index')"
          >
            {{ user.name }}
          </Link>
          <Link :href="route('logout')" method="delete" as="button" class="btn-red mt-2">Logout</Link>
        </div>
        <!--          if user not authenticated redirect him to this window-->
        <div v-else class="flex items-center gap-4 ">
          <Link :href="route('user-account.create')" class="btn-signUp">Register</Link>
          <Link :href="route('login')" class="btn-signIn">Sign-In</Link>
        </div>
      </nav>
    </div>
  </header>
  <!--  <div>The Page with time {{ timer }}</div>-->
  <!--  Render a flash message inside view component We Did that in listing controller once you try to add new listing With-->
  <!--  method creates flash message which is-->
  <!--  temporary data stored on the server on the user assigned session and get destroyed on every next subsequent request-->
  <!--  We Also know that the easy way to pass data to all pages is such through special handler inertia reqeust laravel-->
  <!--  middle ware-->
  <!--  anything i add in handler inertia request is passed to all views-->
  <!--  To access this rendered data we will use usePage function provided from inertia-->

  <main class="container mx-auto p-4 w-full">
    <div
      v-if="flashSuccess"
      class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2"
    >
      {{ flashSuccess }}
    </div>
    <slot>
      Default
    </slot>
  </main>
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { route } from 'ziggy-js'

const page = usePage()
const flashSuccess = computed(() => page.props.flash.success)
const user = computed(() => page.props.user)
// import {ref} from 'vue'
//
// const timer = ref(0)
//
// setInterval(() => {
//   timer.value++
// }, 1000)
</script>


<style scoped>
.success {
    background-color: green;
    color: white;
}
</style>
