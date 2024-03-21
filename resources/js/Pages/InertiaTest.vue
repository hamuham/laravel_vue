<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue'

const newTitle = ref('')
const newContent = ref('')
</script>

<template>

InertiaTest<br>
<a href="/">aタグ</a><br>
<Link href="/">Linkタグ</Link><br>
<Link :href="route('inertia.index')">ineriaroutetest</Link>
<Link :href="route('inertia.show', { id: 1})">ルートパラメータテスト</Link>

<div class="mb-8"></div>
<input type="text" name="newTitle" v-model="newTitle">
<input type="text" name="newContent" v-model="newTitle">

<Link as="button" method="POST" :href('inertia.store')
        :data="{
        title: newTitle,
        content: newContent
    }">DB保存</Link>
    </template>
