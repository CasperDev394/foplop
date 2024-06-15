<template>
    <fop-dialog
        ref="dialog"
        :id="'AdminCategory'"
        @hidden="resetData"
    >
        <fieldset>
            <legend>Категория</legend>

            <n-config-provider style="margin-bottom: 32px; margin-top: 16px" :theme-overrides="themeOverrides">
                <n-input
                    style="max-width: 90%"
                    placeholder="Название"
                    size="large"
                    v-model:value="category.name"

                    required
                />
                <n-select
                    style="width: 300px"
                    placeholder="Направление"
                    filterable
                    clearable
                    v-model:value="category.direction"
                    :options="[
                                    {name:'', value:''},
                                    ...directions?directions:[]
                                ]"
                    label-field="name"
                    value-field="name_slug"
                    size="large"
                />
            </n-config-provider>

        </fieldset>
        <template #footer>
            <div class="category-manager-panel">
                <fop-button
                    fop_type="primary"
                    @click="save"
                >
                    <font-awesome-icon icon="fa-solid fa-check"/>
                    &nbsp;&nbsp;
                    Сохранить
                </fop-button>
                <fop-button
                    v-if="category.id"
                    fop_type="delete"
                    @click="remove"
                >
                    <font-awesome-icon icon="fa-solid fa-trash"/>
                    &nbsp;&nbsp;
                    Удалить
                </fop-button>
            </div>
        </template>
    </fop-dialog>
</template>
<script setup>
import FopDialog from "../base/FopDialog.vue";
import themeOverrides from "@/mixins/themeOverrides.js";
import {ref, watch} from "vue";
import {useVuelidate} from "@vuelidate/core";
import {helpers, required} from "@vuelidate/validators";
import {useDirectionsStore} from "@/stores/admin/directions.ts";

const dialog = ref(null)

const directions = ref(null)

useDirectionsStore().getDirections()
watch(
    [useDirectionsStore()],
    () => {
        directions.value = useDirectionsStore().$state.data
    },
    { deep: true }
)

const category = ref({
    id: null,
    name: '',
})

const rules = {
    category:{
        name: {
            required: helpers.withMessage('Обязательное поле', required)
        },
    }
}

const validator = useVuelidate(rules, {category})
const emit = defineEmits(['updateData'])

const resetData = () => {
    category.value = {
        id: null,
        name: '',
    }
}

const save = () => {
    if (validator.value.$silentErrors.length) {
        return;
    }
    if (category.value.id) {
        axios.post("/admin/categories/" + category.value.name_slug + '/update', category.value)
    } else {
        axios.post("/admin/categories/create", category.value)
    }
    hide()
}

const remove = () => {
    axios.delete("/admin/categories/" + category.value.name_slug + '/delete')
    hide()
}

const show = (item = null) => {
    dialog.value?.show()
    if(item){
        category.value = item
    }
}
const hide = () => {
    resetData()
    emit('updateData')
    dialog.value?.hide()
}

defineExpose({ show, hide });
</script>
<style lang="scss" scoped>
@import '/resources/sass/_variables.scss';

.category-manager-panel{
    & button{
        margin: 0 16px;
    }
}
</style>
