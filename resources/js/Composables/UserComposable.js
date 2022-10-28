import { ref, readonly } from 'vue'
import axios from "axios";

export default function UserComposable() {
    const getCompany = async (route, id) => {
        try {
            let response = await axios.get(route + id);
            return response;
        } 
        catch (e) {
            return e.response;
        }
    }

    const storeUser = async (route, form) => {
        try {
            let response = await axios.post(route, form);
            return response;
        } 
        catch (e) {
            return e.response;
        }
    }

    const updateUser = async (route, form) => {
        try {
            let response = await axios.put(route + form.value.id, form.value);
            return response;
        } 
        catch (e) {
            return e.response;
        }
    }

    const destroyUser = async (route, id) => {
        await axios.delete(route + id);
    }

    return {
        getCompany,
        storeCompany,
        updateCompany,
        destroyCompany
    }
}
