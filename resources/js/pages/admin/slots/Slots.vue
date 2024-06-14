<template>
    <div class="lk-container-page">
        <div class="table-manager-panel">
            <FopButton
                fop_type="primary"
                @click="openPageCreate"
            >
                <font-awesome-icon :icon="['fas', 'fa-lines-leaning']"  />
                &nbsp;&nbsp;
                Добавить торги
            </FopButton>
        </div>
    </div>
</template>
<script setup>

const openPageCreate = () =>{
    window.location.href = "/admin/slots/create"
}
</script>
<style lang="scss" scoped>
@import '/resources/sass/_variables.scss';

</style>
