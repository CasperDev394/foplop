<template>
    <div class="lk-container-page">
        <div class="page-manager-panel">
            <div class="left-panel">
                <fop-button fop_type="primary" @click="exit">
                    <font-awesome-icon :icon="['fas', 'fa-arrow-left']"  />
                </fop-button>

                <div class="page-form">
                    <h2 v-if="!editable">{{lot.name}}</h2>
                    <n-config-provider :theme-overrides="themeOverrides">
                        <n-input
                            style="max-width: 350px"
                            placeholder="Название"
                            size="small"
                            v-model:value="lot.name"

                            required
                        />

                        <n-select
                            style="width: 300px"
                            placeholder="Должник"
                            filterable
                            clearable
                            v-model:value="lot.debtor"
                            :options="[
                                    {name:'', value:''},
                                    ...debtors?debtors:[]
                                ]"
                            label-field="name"
                            value-field="id"
                            size="small"
                        />
                    </n-config-provider>

                </div>
            </div>
            <div class="right-panel">
                <div class="panel-column">
                    <fop-button
                        v-if="editable"
                        fop_type="primary"
                        @click="()=>{editable = !editable}"
                        @click.prevent="save"
                    >
                        <font-awesome-icon :icon="['fas', 'fa-floppy-disk']"  />
                        &nbsp;&nbsp;
                        Сохранить
                    </fop-button>
                    <fop-button
                        v-if="!editable"
                        fop_type="primary"
                        @click="()=>{editable = !editable}"
                    >
                        <font-awesome-icon :icon="['fas', 'fa-pen-to-square']"  />
                        &nbsp;&nbsp;
                        Редактировать
                    </fop-button>


                </div>
            </div>
        </div>
        <div class="page-wrapper">

        </div>
    </div>
</template>
<script setup>
import { useVuelidate } from '@vuelidate/core'
import { required, helpers} from '@vuelidate/validators'
import {ref, watch} from "vue";
import themeOverrides from "@/mixins/themeOverrides.js";
import {useLotStore} from "@/stores/admin/lot.ts";
import {useDebtorsStore} from "@/stores/admin/debtors.ts";



const debtors = ref(null)
const editable = ref(false);
const slug = window.location.href.split('/').pop();
const rules = {
    lot:{
        name: {
            required: helpers.withMessage('Обязательное поле', required)
        },
    }
}

useDebtorsStore().getDebtors()
watch(
    [useDebtorsStore()],
    () => {
        debtors.value = useDebtorsStore().$state.data
    },
    { deep: true }
)


if(slug === 'create'){
    editable.value = true
}

if (slug !== 'slot' && slug !== 'create') {
    useLotStore().getLot('/admin/slots/' + slug + '/read')
}

const lot = ref(useLotStore().$state)

const validator = useVuelidate(rules, {lot})

const exit = () => {
    window.location.href = "/admin/slots"
}

const save = () => {
    if (validator.value.$silentErrors.length) {
        editable.value = true
        return;
    }
    if (lot.value.id) {
        axios.post("/admin/slots/" + lot.value.name_slug + '/update', lot.value)
    } else {
        axios.post("/admin/slots/create", lot.value)
    }
}

</script>
<style lang="scss" scoped>
@import '/resources/sass/_variables.scss';

</style>
