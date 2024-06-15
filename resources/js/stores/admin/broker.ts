import { defineStore } from 'pinia'
import axios from "axios";

export const useBrokerStore = defineStore('broker', {
    state: () => {
        return {
            id:null,
            name_slug:'',
            name:'',
        }
    },
    actions:{
        async getBroker(url){
            axios.get(url).then((resp) => {
                this.id         = resp.data.id
                this.name       = resp.data.name
                this.email       = resp.data.email
                this.name_slug  = resp.data.name_slug

            }).catch(() => {})
        },
    }
})
