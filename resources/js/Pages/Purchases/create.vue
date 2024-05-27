<script setup>
import { onMounted, reactive, ref, computed } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { getToday } from '@/common'

const props = defineProps({
    'customers': Array,
    'items': Array
})

onMounted(() => {
    form.date = getToday()
    props.items.forEach( item => {
    itemList.value.push({
      id: item.id,
      name: item.name,
      price: item.price,
      quantity: 0
    })
  })
})

const itemList = ref([])

const form = reactive({
    date: null,
    customer_id: null
})

const totalPrice = computed(() => {
  let total = 0
  itemList.value.forEach( item => {
    total += item.price * item.quantity
  })
  return total
})

const storePurchase = () => {
  itemList.value.forEach( item => {
    if( item.quantity > 0){
      form.items.push({
        id: item.id,
        quantity: item.quantity
      })
    }
  })
  Inertia.post(route('purchases.store'), form )
}

const quantity = [ "0", "1", "2", "3", "4", "5", "6", "7", "8", "9"]
</script>


<template>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="date" class="leading-7 text-sm text-gray-600">日付</label>
                                    <input type="date" id="date" name="date" v-model="form.date" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="customer" class="leading-7 text-sm text-gray-600">会員名</label>
                                    <MicroModal @update:customerId="setCustomerId" />
                                  </div>
                                </div>
</template>
