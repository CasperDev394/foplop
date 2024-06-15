<template>
    <div class="lk-container-page">
        <div class="table-manager-panel">
            <FopButton
                fop_type="primary"
                @click="openPageCreate"
            >
                <font-awesome-icon :icon="['fas', 'fa-lines-leaning']"  />
                &nbsp;&nbsp;
                Добавить Брокера
            </FopButton>
        </div>
        <data-table
            :headers="headers"
            :items="items"
            :filter-options="filterOptions"
            :loading="loading"
            theme-color="#f48225"
            buttons-pagination
            @click-row="openPageEdit"
            table-class-name="yolo-table customize-table"
        >
            <template #header-name="header">
                <div class="filter-column">
                    {{ header.text }}
                    <div class="filter-input">
                        <n-config-provider :theme-overrides="themeOverrides">
                            <n-input
                                style="width: 300px"
                                placeholder="поиск..."
                                size="small"
                                v-model:value="nameCriteria"
                            />
                        </n-config-provider>
                    </div>
                </div>
            </template>

            <template #item-name="item">
                <p class="text-table-big">{{item.name}}</p>
            </template>

            <template #loading>
                <img
                    src="https://i.pinimg.com/originals/94/fd/2b/94fd2bf50097ade743220761f41693d5.gif"
                    style="width: 100px; height: 80px;"
                />
            </template>
            <template #empty-message>
                <p>Результатов нет</p>
            </template>
        </data-table>
    </div>
</template>
<script setup>
import DataTable from "vue3-easy-data-table";
import {computed, ref, watch} from "vue";
import {useBrokersStore} from "@/stores/admin/brokers.ts";
import themeOverrides from "@/mixins/themeOverrides.js";

const nameCriteria = ref('');
const items = ref([]);
const loading = ref(true)
const headers = ref([
    { text: "Название", value: "name" },
]);

const filterOptions = computed(() => {
    const filterOptionsArray = [];

    filterOptionsArray.push({
        field: 'name',
        criteria: nameCriteria.value,
        comparison: (value, criteria) => (value != null && criteria != null && typeof value === 'string' && value.includes(`${criteria}`)),
    })
    return filterOptionsArray;
})

useBrokersStore().getBrokers()
watch(
    [useBrokersStore()],
    () => {
        items.value = useBrokersStore().$state.data
        loading.value = false
    },
    { deep: true }
)




const openPageCreate = () =>{
    window.location.href = "/admin/brokers/create"
}
const openPageEdit = (item) =>{
    window.location.href = "/admin/brokers/"+item.name_slug
}
</script>
<style lang="scss" scoped>
@import '/resources/sass/_variables.scss';

</style>
