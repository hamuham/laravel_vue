<script setup>
import GuestLayout from '@/Layouts/Guest.vue'
import Lavel from '@/Component/Label.vue'
import Lavel from '@/Component/Input.vue'

const emitTest = e => console.log(e)
</script>

<template>
<GuestLayout>
    <Label value="件名">タイトル</Label>
    <Input
        modelValue="初期値"
        @emitTest="emitTest"
        ></Input>
</GuestLayout>

</template>
