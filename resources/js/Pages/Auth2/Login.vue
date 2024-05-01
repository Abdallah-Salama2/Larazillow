<template>
  <form @submit.prevent="login">
    <!--      Center form on the screen in css  for w-1/2 to take half width for every input element you need to make sure width is full in main in MAinLayout-->
    <div class="w-1/2 mx-auto">
      <div>
        <!--          we added for email that refers to id email in input so when a user click on the label it will activate the input-->

        <label for="email" class="label">E-mail(userName)</label>
        <input id="email" v-model="form.email" type="text" class="input" />
        <div v-if="form.errors.email" class="input-error">{{ form.errors.email }}</div>
        <!--        mt-4 = margin at top with 4 pixels i think-->
        <div class="mt-4">
          <label for="password" class="label">Password</label>
          <input id="password" v-model="form.password" type="password" class="input" />
          <div v-if="form.errors.password" class="input-error">{{ form.errors.password }}</div>
        </div>
        <div class="mt-4">
          <button class="btn-primary w-full" type="submit">Login</button>

          <div class="mt-2 text-center">
            <Link :href="route('user-account.create')" class="text-sm text-gray-500 dark:text-gray-300">
              Need an account? Click here
            </Link>
          </div>
          <div />
        </div>
      </div>
    </div>
  </form>
</template>
<script setup>
import { useForm,Link } from '@inertiajs/vue3'
import { route } from 'ziggy-js'

//Btw if we leavel it like this form wont be connected to form above we need to add v-models in the form above to link both
// v-model="form.email" in the email input its like defining props i think
const form = useForm({
  email: null,
  password: null,
})


//Function that will Handle the authentication and submit data from form to store method to check if its valid and create a user session
//add login function as a method in the form above by @submit.prevent="login" prevent used to prevent default behavior of smth
const login = () => form.post(route('login.store'))
</script>
