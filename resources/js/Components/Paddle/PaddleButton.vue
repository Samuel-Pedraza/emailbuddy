<script setup>

const props = defineProps({
    checkout: Object
})

</script>

<template>
    <a
        href='#!'
        class='paddle_button'
        :data-items=checkout.items
        :data-customer-id=checkout.paddle_id
        :data-success-url=checkout.return_url
        >
        Buy Product
    </a>
</template>

<style scoped>

</style>
