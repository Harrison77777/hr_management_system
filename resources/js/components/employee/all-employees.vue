<template>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Employees</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Employees</a></li>
                    <li class="breadcrumb-item active">Add Employee Section</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Add Employee Form</h4>
                            </div>
                            <div class="col-md-6">
                                <router-link to="/add-employee" class="btn btn-sm btn-info text-light float-right">
                                    Add Employees
                                </router-link>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="button-area">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="query-field-section">
                                                        <label for=""><h5>Search By</h5> </label>
                                                        <select class=" form-control form-control-sm w-50"
                                                            v-model="query" id="">
                                                            <option value="name">Name</option>
                                                            <option value="email">Email</option>
                                                            <option value="phone">Phone</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="search-field-section">
                                                        <input v-model="search" placeholder="Search" type="text"
                                                            class="w-50 form-control form-control-sm ml-auto float-right" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="all-data-table table-responsive">
                            <table class="table table-sm table-hover table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Employee Id</th>
                                        <th>Email</th>
                                        <th>Phone</th>

                                        <th>Place</th>
                                        <th>Salary</th>
                                        <th>Department</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(employee, index) in employees" :key="employee.id" class="text-center">
                                        <td>{{ index +1 }}</td>
                                        <td>{{ employee.name }}</td>
                                        <td>{{ employee.employee_id }}</td>
                                        <td>{{ employee.email }}</td>
                                        <td>{{ employee.phone }}</td>
                                        <td>{{ employee.place }}</td>
                                        <td>{{ employee.salary }}</td>
                                        <td>{{ employee.department }}</td>
                                        <td><img height="40" width="40" :src="employee.photo" alt=""></td>
                                        <td>
                                            <router-link :to="{path:'/details-employee/'+employee.id}" 
                                                 class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </router-link>
                                            <!-- <a data-toggle="modal" data-target="#customerModal" @click="editEmployee(employee.id)"
                                                class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a> -->
                                            <a v-on:click.prevent="deleteEmployee(employee.id)"
                                                class="btn btn-danger btn-sm" href="#">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="py-3" v-if="employees.length == 0" colspan="6">
                                            <span class="alert text-danger d-block alert-sm alert-danger">
                                                Sorry :( No Found
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <pagination :pagination="pagination" v-if="pagination.last_page > 1" :offset="5"
                                @paginate="search === '' ? fetchAllEmployees() : searchEmployees()">
                            </pagination>
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

                employees: [],
                pagination: {
                    current_page: 1
                },
                query: 'name',
                search: '',
            }
        },
        watch: {
            search: function (newQuery, oldQuery) {
                if (newQuery === '') {
                    this.fetchAllEmployees()
                } else {
                    this.searchEmployees()
                }
            }
        },
        mounted() {
            this.fetchAllEmployees()
        },
        methods: {
            fetchAllEmployees() {
                this.$Progress.start()
                axios.get('api/employee/all?page='+this.pagination.current_page)
                    .then(res => {
                        this.employees = res.data.data
                        this.pagination = res.data.meta
                        this.$Progress.finish()
                    }).catch(err => {
                        console.log(err)
                        this.$Progress.fail()
                    })
            },
             searchEmployees() {
                this.$Progress.start()
                axios.get('api/employee/search/' + this.query + '/' + this.search  + '?page=' + this.pagination.current_page)
                    .then(res => {
                        this.employees = res.data.data
                        this.pagination = res.data.meta
                        this.$Progress.finish()

                    }).catch(err => {
                        console.log(err);
                        this.$Progress.fail()
                    })
            },
        },
    }
</script>

<style>

</style>