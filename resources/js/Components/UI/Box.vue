<template>
  <div class="border border-gray-200 dark:border-gray-800 rounded-md p-4 shadow dark:text-grey-300">
    <div class="text-gray-500 font-medium mb-1">
      <slot name="header" />
    </div>
    <slot />
  </div>
</template>


<!--MyComponent.vue-->
<!--<template>-->
<!--    <div class="border border-gray-200 dark:border-gray-800 rounded-md p-4 shadow dark:text-grey-300">-->
<!--        <slot />-->
<!--    </div>-->
<!--</template>-->
<!--<template>-->
<!--    <div>-->
<!--        <MyComponent>-->
<!--            <p>This content will be placed inside the slot.</p>-->
<!--        </MyComponent>-->
<!--    </div>-->
<!--</template>-->
