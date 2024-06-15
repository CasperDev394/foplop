import { defineStore } from 'pinia'
import axios from "axios";

export const useBrokersStore = defineStore('brokers', {
    state: () => {
        return {
            data:{}
        }
    },
    actions:{
        async getBrokers(){
            axios.get('/admin/brokers/getList').then((resp) => {
                this.data = resp.data.data
            }).catch(() => {})
        },
    }
})
