<template>
      <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Department</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Department</a></li>
                    <li class="breadcrumb-item">All Departments Section</li>
                    <li class="breadcrumb-item active"> Departments details</li>
                </ol>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <button class="btn float-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i>
                    Create
                </button>
                <div class="dropdown float-right mr-2 hidden-sm-down">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> January 2019 </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> <a class="dropdown-item"
                            href="#">February 2019</a> <a class="dropdown-item" href="#">March 2019</a> <a
                            class="dropdown-item" href="#">April 2019</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title d-block">Details of {{ department.name }}  </h4>
                            </div>
                            <div class="col-md-6">
                                <router-link to="/all-departments" class="btn btn-sm btn-info float-right">
                                Back
                                </router-link>
                               
                            </div>
                        </div>
                        
                        <hr>
                        <h6 class="card-title"> Employees </h6>
                        
                        <table v-if="countEmployee == 1" class="table table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>place</th>
                                    <th>photo</th>
                                    <th>Qualification</th>
                                    <th>Salary</th>
                                    <th>Last got salary</th>
                                    <th>Current month salary</th>
                                    
                                </tr>
                            </thead>
                            <tbody>                               
                                <tr  v-for="(employee, index) in department.employees" :key="employee.id" class="text-center">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ employee.name }}</td>
                                    <td>{{ employee.place }}</td>
                                    <td>
                                        <img height="50" width="50" :src="employee.photo" alt="employe_photo"/>
                                    </td>
                                   <td>{{ employee.qualification }}</td>
                                   <td>{{ employee.salary }}</td>
                                   <td>{{ employee.last_salary_pay_month }}</td>
                                   <td>{{ employee.got_current_month_salary }}</td>
                                </tr> 
                                                              
                                
                            </tbody>
                        </table>
                        <div v-else class="text-center">There is no employee in this department</div>
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
    name:'details-department',
    data() {
        return {
           department:[], 
        }
    },
    mounted() {
        this.fetchDepartmentDetails()
    },
    methods: {
        fetchDepartmentDetails(){
            axios.get(`api/department/details/${this.$route.params.id}`)
            .then(res => {
                this.$Progress.start()
                this.department = res.data.data
                this.$Progress.finish()
            })
        }
    },
    computed: {
        countEmployee(){
             if (this.department.employees == 0) {
                 return 0
             }else{
                 return 1
             }
        }
    },
}
</script>

<style>

</style>