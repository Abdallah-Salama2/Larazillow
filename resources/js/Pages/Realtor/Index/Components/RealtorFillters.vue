<template>
  <form>
    <div class="mb-4 mt-4 flex flex-wrap gap-2">
      <div class="flex flex-nowrap items-center gap-2">
        <input
          v-model="filterForm.deleted"
          type="checkbox"
          class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
        />
        <label class="">
          Deleted Listings
        </label>
      </div>

      <!-- Reactive dropdowns for 'by' and 'order' -->
      <div>
        <select v-model="filterForm.by" class="input-filter-l w-24">
          <option value="">Sort By</option>
          <option value="created_at">Added</option>
          <option value="price">Price</option>
        </select>
        <select v-model="filterForm.order" class="input-filter-r w-32">
          <option value="">Sort Order</option>
          <option value="asc">Ascending</option>
          <option value="desc">Descending</option>
        </select>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { route } from 'ziggy-js'
import { watch } from 'vue'

const props = defineProps({
  filters: Object,
})

const filterForm = useForm({
  deleted: props.filters.deleted ?? false,
  by: props.filters.by ?? '', // default value for 'by'
  order: props.filters.order ?? '', // default value for 'order'
})

// Watch for changes in 'deleted', 'by', and 'order' filters
watch([() => filterForm.deleted, () => filterForm.by, () => filterForm.order], ([deleted, by, order], [prevDeleted, prevBy, prevOrder]) => {
  if (deleted !== prevDeleted || by !== prevBy || order !== prevOrder) {
    filter() // Trigger filtering when any of the filters change
  }
})

const filter = () => {
  filterForm.get(route('realtor.listing.index'), {
    preserveState: true,
    preserveScroll: true,
  })
}
</script>
