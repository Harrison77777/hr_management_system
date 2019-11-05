import axios from "axios";

export const storage = {
    state:{
        departments: [],
        
    },
    getters:{
        getDepartments(state){
           return state.departments
        },
        
    },
    actions:{
        fetchDepartments(context){
            axios.get('api/department/all')
            .then(res => {
                
                context.commit('mutatedAllDepartments', res.data.data)  
            })
        }, 
    },
    mutations:{
        mutatedAllDepartments(state, data){
            return state.departments = data
        },
       
        

    }
}