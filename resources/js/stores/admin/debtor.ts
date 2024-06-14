import { defineStore } from 'pinia'
import axios from "axios";

export const useDebtorStore = defineStore('debtor', {
    state: () => {
        return {
            id:null,
            first_name:'',
            last_name:'',
            fathers_name:'',
            name_slug:'',
            name:'',

        }
    },
    actions:{
        async getDebtor(url){
            axios.get(url).then((resp) => {
                this.id = resp.data.id
                this.name = resp.data.name
                this.first_name = resp.data.first_name
                this.last_name = resp.data.last_name
                this.fathers_name = resp.data.fathers_name
                this.name_slug = resp.data.name_slug
            }).catch(() => {})
        },
    }
})
