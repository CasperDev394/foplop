<template>
    <div class="lk-container-page">
        <div class="page-manager-panel">
            <div class="left-panel">
                <fop-button fop_type="primary" @click="exit">
                    <font-awesome-icon :icon="['fas', 'fa-arrow-left']"  />
                </fop-button>

                <div class="page-form">
                    <h2 v-if="!editable">{{debtor.first_name+' '+debtor.last_name+' '+debtor.fathers_name}}</h2>
                    <n-config-provider v-if="editable" :theme-overrides="themeOverrides">
                        <n-input
                            style="max-width: 350px"
                            placeholder="Фамилия"
                            size="small"
                            v-model:value="debtor.first_name"

                            required
                        />
                        <n-input
                            style="max-width: 350px"
                            placeholder="Имя"
                            size="small"
                            v-model:value="debtor.last_name"

                        />
                        <n-input
                            style="max-width: 350px"
                            placeholder="Отчество"
                            size="small"
                            v-model:value="debtor.fathers_name"

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
import {ref} from "vue";
import themeOverrides from "@/mixins/themeOverrides.js";
import { useDebtorStore } from "@/stores/admin/debtor.ts";
// const debtorStore = useDebtorStore()

const editable = ref(false);
const slug = window.location.href.split('/').pop();
const rules = {
    debtor:{
        first_name: {
            required: helpers.withMessage('Обязательное поле', required)
        },
    }
}
if(slug === 'create'){
    editable.value = true
}

if (slug !== 'slot' && slug !== 'create') {
    useDebtorStore().getDebtor('/admin/debtors/' + slug + '/read')
}

const debtor = ref(useDebtorStore().$state)

const validator = useVuelidate(rules, {debtor})

const exit = () => {
    window.location.href = "/admin/debtors"
}

const save = () => {
    if (validator.value.$silentErrors.length) {
        editable.value = true
        return;
    }
    if (debtor.value.id) {
        axios.post("/admin/debtors/" + debtor.value.name_slug + '/update', debtor.value)
    } else {
        axios.post("/admin/debtors/create", debtor.value)
    }
}

</script>
<style lang="scss" scoped>
@import '/resources/sass/_variables.scss';

</style>
