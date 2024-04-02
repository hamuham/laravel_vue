<script setup>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

const from = reacive({
    title: null,
    content: null
})

const submitFunction = () => {
    Inertia.post('/Inertia', form)
}
</script>

<template>
    <form @submit.prevent="">
        <input type="text" name="title" v-model="form.title"><br>
        <input type="text" name="content" v-model="form.content">
        <button>送信</button>
    </form>
</template>
