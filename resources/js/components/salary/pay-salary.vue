<template>
     <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Salary Saction</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Salary</a></li>
                    <li class="breadcrumb-item active">Departments Department wise salary</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Select Department and pay salary </h4>
                        <div class="row">
                            
                            <div v-for="department in allDepartmentForPaySalary" :key="department.id" class="col-md-3">
                                <div class="all-department">
                                    <router-link :to="{path:'/department/wise/salary/'+department.id}">
                                        <div class="single-department-area border text-center p-2">
                                            <h4>{{ department.name }}</h4>
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <vue-progress-bar></vue-progress-bar>
          <vue-snotify></vue-snotify>
    </div>   
</template>

<script>
export default {
    name:'pay-salary',
    data() {
        return {
            departments:[],
            

        }
    },
    mounted() {
        this.$store.dispatch('fetchDepartments')
    },
    methods: {
        
    },
    computed: {
        allDepartmentForPaySalary(){
            return this.$store.getters.getDepartments
        }
    },
}
</script>

<style>

</style>