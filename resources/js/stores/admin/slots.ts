import { defineStore } from 'pinia'
import axios from "axios";

export const useSlotsStore = defineStore('slots', {
    state: () => {
        return {
            data:{}
        }
    },
    actions:{
        async getSlots(){
            axios.get('/admin/slots/getList').then((resp) => {
                this.data = resp.data.data
            }).catch(() => {})
        },
    }
})
