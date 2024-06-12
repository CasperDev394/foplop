<template>
    <div class="search__top-block">
        <h1 class="primary">
            {{h1}}
        </h1>
    </div>
</template>
<script setup>

const props = defineProps({
    h1: {
        type: String,
        required: true
    }
})

</script>
