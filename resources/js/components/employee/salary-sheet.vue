<template>
     <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Employees</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                       All Employee
                    </li>
                    <li class="breadcrumb-item">
                        Employee Details
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Employee's Salary all month Sheet</a>
                    </li>
                </ol>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">All Salary Sheet's Of Employee {{ employeeSalary.name }}
                                </h4>
                            </div>
                            <div class="col-md-6">
                               <router-link class="btn btn-sm btn-info float-right" :to="{path:'/details-employee/'+employeeSalary.id}">Back</router-link>
                            </div>
                           
                        </div>
                    
                        <div class="all-data-table table-responsive">
                            <table class="table table-sm table-hover table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th>Serial</th>
                                    <th>Paid month</th>
                                    <th>Paid Date</th>
                                    <th>Paid Year</th>
                                    <th>Paid Amount</th>
                                </tr>
                            </thead>
                            <tbody>                               
                                <tr v-for="(salary, index) in employeeSalary.salaries" :key="index" class="text-center">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ salary.month }}</td>
                                    <td>{{ salary.date }}</td>
                                    <td>{{ salary.year }}</td>
                                    <td>{{ salary.paid_amount }}</td>
                                </tr>
                            </tbody>
                            </table>
                           
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
    name: 'salary-sheet',
    data() {
        return {
            employeeSalary:[]
        }
    },
    mounted() {
       this.getEmployeeSalarySheets()
    },
    methods: {
        getEmployeeSalarySheets(){
            this.$Progress.start()
            axios.get('api/employee/salary/sheets/'+this.$route.params.id)
            .then(res => {
                this.employeeSalary = res.data.data
                this.$Progress.finish()
            }).catch(err => {
                console.log(err)
                this.$Progress.fail()
            })
        }
    },
    computed: {
        
    },
}
</script>

<style>

</style>