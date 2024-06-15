import { defineStore } from 'pinia'
import axios from "axios";

export const useCourtsStore = defineStore('courts', {
    state: () => {
        return {
            data:{}
        }
    },
    actions:{
        async getCourts(){
            axios.get('/admin/courts/getList').then((resp) => {
                this.data = resp.data.data
            }).catch(() => {})
        },
    }
})
