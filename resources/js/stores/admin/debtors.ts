import { defineStore } from 'pinia'
import axios from "axios";

export const useDebtorsStore = defineStore('debtors', {
    state: () => {
        return {
            data:{}
        }
    },
    actions:{
        async getDebtors(){
            axios.get('/admin/debtors/getList').then((resp) => {
                this.data = resp.data.data
            }).catch(() => {})
        },
    }
})
