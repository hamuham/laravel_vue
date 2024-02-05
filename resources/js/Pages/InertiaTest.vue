<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>

InertiaTest<br>
<a href="/">aタグ</a><br>
<Link href="/">Linkタグ</Link><br>
<Link :href="route('inertia.index')">ineriaroutetest</Link>

</template>
