<template>
    <div class="lk-container-page">
        <div class="page-manager-panel">
            <div class="left-panel">
                <fop-button fop_type="primary" @click="exit">
                    <font-awesome-icon :icon="['fas', 'fa-arrow-left']"  />
                </fop-button>
                <div class="page-form">
                    <h2 v-if="!editable">{{broker.name}}</h2>
                    <n-config-provider :theme-overrides="themeOverrides">
                        <n-input
                            v-if="editable"
                            style="max-width: 350px"
                            placeholder="Название"
                            size="small"
                            v-model:value="broker.name"

                            required
                        />
                        <n-input
                            v-if="editable"
                            style="max-width: 350px"
                            placeholder="Название"
                            size="small"
                            v-model:value="broker.email"

                            required
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
import {useBrokerStore} from "@/stores/admin/broker.ts";

const editable = ref(false);
const slug = window.location.href.split('/').pop();
const rules = {
    broker:{
        name: {
            required: helpers.withMessage('Обязательное поле', required)
        },
    }
}

if(slug === 'create'){
    editable.value = true
}

if (slug !== 'broker' && slug !== 'create') {
    useBrokerStore().getBroker('/admin/brokers/' + slug + '/read')
}

const broker = ref(useBrokerStore().$state)

const validator = useVuelidate(rules, {broker})


const exit = () => {
    window.location.href = "/admin/brokers"
}
const save = () => {
    if (validator.value.$silentErrors.length) {
        editable.value = true
        return;
    }
    if (broker.value.id) {
        axios.post("/admin/brokers/" + broker.value.name_slug + '/update', broker.value)
    } else {
        axios.post("/admin/brokers/create", broker.value)
    }
}

</script>
<style lang="scss" scoped>
@import '/resources/sass/_variables.scss';

</style>
