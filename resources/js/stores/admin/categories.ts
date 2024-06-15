import { defineStore } from 'pinia'
import axios from "axios";

export const useCategoriesStore = defineStore('categories', {
    state: () => {
        return {
            data:{}
        }
    },
    actions:{
        async getCategories(){
            axios.get('/admin/categories/getList').then((resp) => {
                this.data = resp.data.data
            }).catch(() => {})
        },
    }
})
