<template>
    <fop-dialog
        ref="dialog"
        :id="'AdminDirection'"
        @hidden="resetData"
    >
        <fieldset>
            <legend>Направление</legend>

            <n-config-provider style="margin-bottom: 32px; margin-top: 16px" :theme-overrides="themeOverrides">
                <n-input
                    style="max-width: 90%"
                    placeholder="Название"
                    size="large"
                    v-model:value="direction.name"

                    required
                />
            </n-config-provider>

        </fieldset>
        <template #footer>
            <div class="direction-manager-panel">
                <fop-button
                    fop_type="primary"
                    @click="save"
                >
                    <font-awesome-icon icon="fa-solid fa-check"/>
                    &nbsp;&nbsp;
                    Сохранить
                </fop-button>
                <fop-button
                    v-if="direction.id"
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
import {ref} from "vue";
import {useVuelidate} from "@vuelidate/core";
import {helpers, required} from "@vuelidate/validators";

const dialog = ref(null)

const direction = ref({
    id: null,
    name: '',
})

const rules = {
    direction:{
        name: {
            required: helpers.withMessage('Обязательное поле', required)
        },
    }
}

const validator = useVuelidate(rules, {direction})
const emit = defineEmits(['updateData'])

const resetData = () => {
    direction.value = {
        id: null,
        name: '',
    }
}

const save = () => {
    if (validator.value.$silentErrors.length) {
        return;
    }
    if (direction.value.id) {
        axios.post("/admin/directions/" + direction.value.name_slug + '/update', direction.value)
    } else {
        axios.post("/admin/directions/create", direction.value)
    }
    hide()
}

const remove = () => {
    axios.delete("/admin/directions/" + direction.value.name_slug + '/delete')
    hide()
}

const show = (item = null) => {
    dialog.value?.show()
    if(item){
        direction.value = item
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

.direction-manager-panel{
    & button{
        margin: 0 16px;
    }
}
</style>
