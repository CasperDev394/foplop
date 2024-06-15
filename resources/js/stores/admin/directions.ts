import { defineStore } from 'pinia'
import axios from "axios";

export const useDirectionsStore = defineStore('directions', {
    state: () => {
        return {
            data:{}
        }
    },
    actions:{
        async getDirections(){
            axios.get('/admin/directions/getList').then((resp) => {
                this.data = resp.data.data
            }).catch(() => {})
        },
    }
})
