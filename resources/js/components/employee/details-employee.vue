<template>
   <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Employee Details</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Employee</a></li>
                    <li class="breadcrumb-item ">All Employee</li>
                    <li class="breadcrumb-item active"> <a href="javascript:void(0)">Employee Details Of {{ employee.name }}</a></li>
                </ol>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <div class="dropdown float-right  hidden-sm-down">
                    <router-link to="" class="btn btn-secondary btn-sm"> Update Profile Photo </router-link>
                </div>
                <router-link :to="{path:'/edit-employeeInfo/'+employee.id}" class="btn mr-2 float-right btn-sm text-white btn-info"><i class="mdi mdi-pencil-box-outline"></i>
                    Edit Information
                </router-link>
                
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">All Details of {{ employee.name }}</h4>
                            </div>
                            <div class="col-md-6">
                                <router-link to="/all-employee" class="btn btn-sm btn-info text-light float-right">
                                    All Employees
                                </router-link>
                                <router-link :to="{path:'/employee-salary-sheet/'+employee.id}" class="btn btn-sm btn-info text-light m-r-15 float-right">
                                    See the salary records of {{ employee.name }}
                                </router-link>
                            </div>
                        </div>
                        <div class="employee-datails-area">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="employee-photo-area">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="employee-photo text-left">
                                                    <img class="rounded mb-1" height="230" width="200" :src="employee.photo" alt="">
                                                </div>
                                            </div>                                           
                                        </div>
                                    </div>
                                    <div class="employee-info-area">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="employee-info table-responsive">
                                                    <table class="table table-sm">
                                                        <tr>
                                                            <td> <strong>Name:</strong> </td>
                                                            <td>{{ employee.name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td> <strong>Employee ID:</strong> </td>
                                                            <td>{{ employee.employee_id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone:</td>
                                                            <td>{{ employee.phone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>E-mail:</td>
                                                            <td>{{ employee.email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Department:</td>
                                                            <td>{{ employee.department }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Place:</td>
                                                            <td>{{ employee.place }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Salary:</td>
                                                            <td>{{ employee.salary }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Age :</td>
                                                            <td>27</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Current Month Salary:</td>
                                                            <td>{{ employee.current_month_salary }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Joining date:</td>
                                                            <td>{{ employee.joining_date }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Last salary pay at:</td>
                                                            <td>{{ employee.last_salary_pay_date }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Qualification:</td>
                                                            <td>{{ employee.qualification }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Address:</td>
                                                            <td>{{ employee.address }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    name:'details-employee',
    data() {
        return {
            employee:'',
        }
    },
    mounted() {
        this.fetchEmployeeDetails()
    },
    methods: {
        fetchEmployeeDetails(){
            
            axios.get(`api/employee/details/${this.$route.params.id}`)
            .then(res => {
                this.$Progress.start()
                this.employee = res.data.data
                this.$Progress.finish()
            }).catch(err => {
                console.log(err);
                this.$Progress.fail()
            })
        },
        
    },
}
</script>

<style scoped>
.active {
    color: deepskyblue;
}

</style>