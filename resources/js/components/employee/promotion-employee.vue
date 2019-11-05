<template>
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor mb-0 mt-0">Employee Promotion Section</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Employee</a></li>
                <li class="breadcrumb-item "> Employee Promotion</li>
            </ol>
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
                        </div>
                    </div>
                    <div class="employee-datails-area">
                        <div class="employee-search-area">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="employee-serch-form-area">
                                        <div class="col-md-6 offset-3">
                                            <div class="employee-search-from">
                                                <div class="title-area text-center">
                                                    <h6>Enter the employee ID and search employee to promotion</h6>
                                                </div>
                                                <form @submit.prevent="searchEmployeeForPromotion">
                                                    <div class="form-group-inline">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                               <div class="col-md-4 text-center">
                                                                    <label class="mt-1" for="">Employee ID</label>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <input 
                                                                        placeholder="Employee ID" class="form-control form-control-sm" 
                                                                        type="text" 
                                                                        v-model="searchField" 
                                                                    />
                                                                   <strong> <span id="emptyField" class="text-danger"></span></strong>
                                                                </div> 
                                                                <div class="col-md-3">
                                                                    <button class="btn btn-sm btn-success" type="submit">Search</button>
                                                                </div>
                                                            </div>               
                                                        </div>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="employee !== ''" class="row">
                            <div class="col-md-12">
                                <div class="employee-photo-area-promotion-section">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="employee-photo text-left">
                                                <img class="rounded mb-1" height="150" width="140" :src="employee.photo" alt="">
                                            </div>
                                        </div>                                           
                                        <div class="col-md-8">
                                            <div class="employee-promotion-form">
                                                <div class="promotion-form border mt-3 p-2 rounded">
                                                    <div class="heading-section text-center">
                                                        <h6> <strong>Promotion form</strong> </h6>
                                                    </div>
                                                    <form @submit.prevent='employeePromotion(employee.id)'>
                                                        <div class="form-group">
                                                            <div class="row ">
                                                                <div class="col-md-3">
                                                                    <label class="float-right mt-1" for="">Current Place:</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                <input readonly type="text" class="form-control float-left form-control-sm" v-model="employee.place">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="float-right mt-1" for="">Promotion to:</label>
                                                                </div>
                                                                <div class="col-md-3 ">
                                                                <input  
                                                                    type="text" 
                                                                    class="form-control float-left form-control-sm" 
                                                                    placeholder="Promoted place name" v-model="promotion"
                                                                />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="submit-btn text-center">
                                                            <button class="btn btn-sm btn-success" type="submit">Submit</button>
                                                        </div>
                                                        <div class="show-error text-center">
                                                           <strong> <span id="promotionEmptyError" class="text-danger "></span></strong>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>                                           
                                    </div>
                                </div>
                                <div  class="employee-info-area">
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
                        <div v-else class="not-found-message text-center">
                            <h6 class="text-danger"><strong>{{ NotFound }}</strong> </h6>
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
    data() {
        return {
            employee:'',
            searchField:'',
            NotFound:'',
            promotion:''
        }

    },
    mounted() {
        
    },
    methods: {
        searchEmployeeForPromotion(){
           if (this.searchField == '') {
               document.getElementById('emptyField').innerHTML = 'Emter the employee ID'
               this.NotFound = ''
               return
           }else{
               document.getElementById('emptyField').innerHTML = ''
               this.NotFound = ''
           }
           axios.get('api/employee/search/for/promotion/'+this.searchField)
           .then(res => {
               console.log(res)
                    //this.employee = ''
                   this.employee = res.data.data
                    this.NotFound = ''
           }).catch(err => {
               this.employee = ''
               this.NotFound = err.response.data.error
               console.log(err.response)
           })
        },
        employeePromotion(employeeId){
            axios.put(`api/employee/promotion/${employeeId}`,{
                promotion : this.promotion
            }).then(res=> {
                console.log(res) 
                document.getElementById('promotionEmptyError').innerHTML = '' 
                this.promotion = ''  
                this.$snotify.success(res.data.success, 'Success')

            }).catch(err => {
                console.log(err.response)
                let error = err.response.data.errors.promotion
                if (error) {
                    document.getElementById('promotionEmptyError').innerHTML = error[0]
                }else{
                  document.getElementById('promotionEmptyError').innerHTML = '' 
                }
            })
        }
    },
    computed: {
        
    },
}
</script>

<style>

</style>