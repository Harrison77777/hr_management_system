<template>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-theme-color mb-0 mt-0">Salary</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Salary</a>
                    </li>
                    <li class="breadcrumb-item">Select department</li>
                    <li class="breadcrumb-item active">Department wise salary</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                
                                <h4 v-if="upPaidEmployeeCount == 1" class="card-title d-block">
                                    All employees of {{ department }} those who
                                    until
                                    now didn't get there current month salary
                                </h4>
                                <h4 class="text-success" v-else>All employees have got their  salary of current month</h4>
                            </div>
                            <div class="col-md-2">
                                <router-link to="/pay-salary" class="btn btn-sm btn-info float-right">Back</router-link>
                            </div>
                        </div>

                        <hr />

                        <h6 class="card-title">Employees</h6>

                        <table class="table table-sm">
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(employee, index) in allUnpaidSalaryEmployee" :key="employee.id"
                                    class="text-center">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ employee.name }}</td>
                                    <td>{{ employee.place }}</td>
                                    <td>
                                        <img height="50" width="50" :src="employee.photo" alt="employee_photo" />
                                    </td>
                                    <td>{{ employee.qualification }}</td>
                                    <td>{{ employee.salary }}</td>
                                    <td>{{ employee.last_paid_salary }}</td>
                                    <td>{{ employee.current_month_salary }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="#"
                                            @click.prevent="getInfoEmp(employee)">Pay salary</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <a-modal :visible="visible" @cancel="handleCancel">
            <div class="row">
                <div class="col-md-12">
                    <div class="emp-info-salary-area border mt-5">
                        <div class="salary-info py-2 px-2">
                            <div class="title-section text-center">
                                <h5>Employee Information</h5>
                            </div>
                            <strong>
                                <p class="m-0">Name: <strong class="text-danger">{{ employeeName }}</strong></p>
                            </strong>
                            <strong>
                                <p class="m-0">
                                    Per month salary:
                                    <strong>
                                        <span class="text-danger">{{ employeeSalary }} TK.</span>
                                    </strong>
                                </p>
                            </strong>
                            <strong>
                                <p class="m-0">EmployeeId: <strong class="text-dark">{{ employeeId }}</strong></p>
                            </strong>
                            <strong>
                                <p class="m-0">Current month salary: <strong class="text-dark">{{ current_month_salary }}</strong></p>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="salary-form-section border mt-2">
                        <div class="salary-title-section p-2 text-center">
                            <h5>Pay Salary Form</h5>
                        </div>
                        <form @submit.prevent="payCurrentMonthSalary">
                            <div class="form-group border py-2">
                                <div class="row justify-content-center">
                                    <div class="col-md-3">
                                        <label for>Amount:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input placeholder="Enter salary amount" v-model="form.amount" type="text"
                                            name="amount" class="form-control form-control-sm"
                                            :class="{ 'is-invalid': form.errors.has('amount')}" />
                                        <strong>
                                            <has-error :form="form" field="amount"></has-error>
                                        </strong>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row justify-content-center">
                                    <button class="btn btn-sm btn-success" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </a-modal>

        <vue-progress-bar></vue-progress-bar>
        <vue-snotify></vue-snotify>
    </div>
</template>

<script>
    export default {
        name: "department-wise-salary",
        data() {
            return {
                
                form: new Form({
                    amount: ""
                }),
                department:'',
                allUnpaidSalaryEmployee:[],
                visible: false,
                employeeName: "",
                employeeSalary: "",
                employeeId: "",
                current_month_salary: "",
                employeeRowId: ""
            };
        },
        mounted() {
            this.fetchDepartmentDetails();
         
        },
        methods: {
            fetchDepartmentDetails() {
                this.$Progress.start();
                axios.get(`api/salary/unpaid/employee/current/month/${this.$route.params.id}`).then(res => {
                    
                    this.allUnpaidSalaryEmployee = res.data.data;
                    this.department = res.data.department;
                    this.$Progress.finish();
                });
            },

            getInfoEmp(employee) {
                this.visible = true;
                this.employeeName = "";
                this.employeeSalary = "";
                this.employeeId = "";
                this.current_month_salary = "";
                this.employeeRowId = "";
                this.employeeRowId = employee.id;
                this.employeeName = employee.name;
                this.employeeSalary = employee.salary;
                this.employeeId = employee.emp_id;
                this.current_month_salary = employee.current_month_salary;
            },
            handleCancel(e) {
                console.log("Clicked cancel button");
                this.visible = false;
            },

            payCurrentMonthSalary() {
                this.form
                    .post(`api/salary/pay/${this.employeeRowId}`)
                    .then(res => {
                        //console.log(res);
                        this.visible = false;
                        this.fetchDepartmentDetails();
                        this.$snotify.success(res.data.success);
                        this.form.amount = "";
                    })
                    .catch(err => {
                        console.log(err.response);
                    });
            }
        },
        computed: {
            
            upPaidEmployeeCount(){
                if (this.allUnpaidSalaryEmployee < 1) {
                    return 0
                }else{
                    return 1
                }
            }
            
        }
    };
</script>

<style>
    #app {
        font-family: sans-serif;
    }
</style>