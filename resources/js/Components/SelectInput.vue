<script setup>
import { onMounted, ref } from 'vue'

const model = defineModel({
  type: String,
  default: '',
})

defineProps({
  placeholder: {
    type: String,
  },
})

const select = ref(null)

onMounted(() => {
  if (select.value.hasAttribute('autofocus')) {
    select.value.focus()
  }
})

defineExpose({ focus: () => select.value.focus() })
</script>

<template>
  <select
    ref="select"
    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600"
    v-model="model"
  >
    <option value="" disabled>
      {{ placeholder || $t('Select an option') }}
    </option>
    <slot />
  </select>
</template>
