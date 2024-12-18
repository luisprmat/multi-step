<script setup>
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SelectInput from '@/Components/SelectInput.vue'
import TextInput from '@/Components/TextInput.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps({
  countries: Object,
  cities: Object,
})

const currentStep = ref(1)
const form = useForm({
  step1: {
    from_country: '',
    from_city: '',
  },
  step2: {
    to_country: '',
    to_city: '',
  },
  step3: {
    adults: 0,
    children: 0,
  },
})

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
              <div v-if="currentStep === 1">
                <div class="mt-4">
                  <InputLabel for="from-country" :value="$t('From Country')" />
                  <SelectInput
                    id="from-country"
                    class="mt-2 w-56"
                    v-model="form.step1.from_country"
                    required
                  >
                    <option
                      v-for="country in props.countries"
                      :value="country.id"
                      :key="country.id"
                    >
                      {{ country.name }}
                    </option>
                  </SelectInput>
                </div>

                <div class="mt-4">
                  <InputLabel for="from-city" :value="$t('From City')" />
                  <SelectInput
                    id="from-city"
                    class="mt-2 w-56"
                    v-model="form.step1.from_city"
                    required
                  >
                    <option
                      v-for="city in props.cities[form.step1.from_country]"
                      :value="city.id"
                      :key="city.id"
                    >
                      {{ city.name }}
                    </option>
                  </SelectInput>
                </div>
              </div>

              <div v-if="currentStep === 2">
                <div class="mt-4">
                  <InputLabel for="to-country" :value="$t('To Country')" />
                  <SelectInput
                    id="to-country"
                    class="mt-2 w-56"
                    v-model="form.step2.to_country"
                    required
                  >
                    <option
                      v-for="country in props.countries"
                      :value="country.id"
                      :key="country.id"
                    >
                      {{ country.name }}
                    </option>
                  </SelectInput>
                </div>

                <div class="mt-4">
                  <InputLabel for="to-city" :value="$t('To City')" />
                  <SelectInput
                    id="to-city"
                    class="mt-2 w-56"
                    v-model="form.step2.to_city"
                    required
                  >
                    <option
                      v-for="city in props.cities[form.step2.to_country]"
                      :value="city.id"
                      :key="city.id"
                    >
                      {{ city.name }}
                    </option>
                  </SelectInput>
                </div>
              </div>

              <div v-if="currentStep === 3">
                <div class="mt-4">
                  <InputLabel for="adults-number" :value="$t('Adults')" />
                  <TextInput
                    id="adults-number"
                    type="number"
                    class="mt-2"
                    v-model="form.step3.adults"
                    required
                  />
                </div>

                <div class="mt-4">
                  <InputLabel for="children-number" :value="$t('Children')" />
                  <TextInput
                    id="adults-number"
                    type="number"
                    class="mt-2"
                    v-model="form.step3.children"
                    required
                  />
                </div>
              </div>

              <PrimaryButton class="mt-4">
                {{ currentStep < 3 ? $t('Next') : $t('Submit') }}
              </PrimaryButton>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
