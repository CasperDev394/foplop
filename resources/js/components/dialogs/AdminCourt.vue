<template>
    <fop-dialog
        ref="dialog"
        :id="'AdminCourt'"
        @hidden="resetData"
    >
        <fieldset>
            <legend>Суд</legend>

            <n-config-provider style="margin-bottom: 32px; margin-top: 16px" :theme-overrides="themeOverrides">
                <n-input
                    style="max-width: 90%"
                    placeholder="Название"
                    size="large"
                    v-model:value="court.name"

                    required
                />
            </n-config-provider>

        </fieldset>
        <template #footer>
            <div class="court-manager-panel">
                <fop-button
                    fop_type="primary"
                    @click="save"
                >
                    <font-awesome-icon icon="fa-solid fa-check"/>
                    &nbsp;&nbsp;
                    Сохранить
                </fop-button>
                <fop-button
                    v-if="court.id"
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

const court = ref({
    id: null,
    name: '',
})

const rules = {
    court:{
        name: {
            required: helpers.withMessage('Обязательное поле', required)
        },
    }
}

const validator = useVuelidate(rules, {court})
const emit = defineEmits(['updateData'])

const resetData = () => {
    court.value = {
        id: null,
        name: '',
    }
}

const save = () => {
    if (validator.value.$silentErrors.length) {
        return;
    }
    if (court.value.id) {
        axios.post("/admin/courts/" + court.value.name_slug + '/update', court.value)
    } else {
        axios.post("/admin/courts/create", court.value)
    }
    hide()
}

const remove = () => {
    axios.delete("/admin/courts/" + court.value.name_slug + '/delete', court.value)
    hide()
}

const show = (item = null) => {
    dialog.value?.show()
    if(item){
        court.value = item
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

.court-manager-panel{
    & button{
        margin: 0 16px;
    }
}
</style>
