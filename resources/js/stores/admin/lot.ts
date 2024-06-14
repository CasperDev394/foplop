import { defineStore } from 'pinia'
import axios from "axios";

export const useLotStore = defineStore('lot', {
    state: () => {
        return {
            id:null,
            name_slug:'',
            name:'',
            published:null,
            debtor:null,
        }
    },
    actions:{
        async getLot(url){
            axios.get(url).then((resp) => {
                this.id         = resp.data.id
                this.name       = resp.data.name
                this.name_slug  = resp.data.name_slug
                this.published  = resp.data.published
                this.debtor  = resp.data.debtor

            }).catch(() => {})
        },
    }
})
