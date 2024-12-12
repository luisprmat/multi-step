<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'

const currentStep = ref(1)

const submit = () => {
  if (currentStep.value < 3) {
    currentStep.value = currentStep.value + 1
  } else {
    // Post form
  }
}
</script>

<template>
  <Head :title="$t('Dashboard')" />

  <AuthenticatedLayout>
    <template #header>
      <h2
        class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
      >
        {{ $t('Dashboard') }}
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div
          class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
        >
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="flex">
              <button
                type="button"
                v-on:click="currentStep = 1"
                :class="[
                  currentStep === 1
                    ? 'rounded-sm border border-b-0'
                    : 'border-b',
                ]"
                class="cursor-pointer border-indigo-500 bg-gray-100 p-2 text-gray-700 outline-none focus:outline-none dark:bg-gray-900 dark:text-gray-300 dark:disabled:text-gray-500"
              >
                {{ $t('From') }}
              </button>
              <button
                type="button"
                v-on:click="currentStep = 2"
                :class="[
                  currentStep === 2
                    ? 'rounded-sm border border-b-0'
                    : 'border-b',
                ]"
                class="cursor-pointer border-indigo-500 bg-gray-100 p-2 text-gray-700 outline-none focus:outline-none disabled:cursor-not-allowed disabled:text-gray-400 dark:bg-gray-900 dark:text-gray-300 dark:disabled:text-gray-500"
                :disabled="currentStep < 2"
              >
                {{ $t('To') }}
              </button>
              <button
                type="button"
                v-on:click="currentStep = 3"
                :class="[
                  currentStep === 3
                    ? 'rounded-sm border border-b-0'
                    : 'border-b',
                ]"
                class="cursor-pointer border-indigo-500 bg-gray-100 p-2 text-gray-700 outline-none focus:outline-none disabled:cursor-not-allowed disabled:text-gray-400 dark:bg-gray-900 dark:text-gray-300 dark:disabled:text-gray-500"
                :disabled="currentStep < 3"
              >
                {{ $t('Passengers') }}
              </button>
              <div class="flex-grow border-b border-indigo-500"></div>
            </div>

            <form @submit.prevent="submit">
              <div v-if="currentStep === 1">Step 1</div>

              <div v-if="currentStep === 2">Step 2</div>

              <div v-if="currentStep === 3">Step 3</div>

              <PrimaryButton>
                {{ currentStep < 3 ? $t('Next') : $t('Submit') }}
              </PrimaryButton>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
