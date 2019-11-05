<template>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Employee</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Employee</a></li>
                    <li class="breadcrumb-item ">Employee Details</li>
                    <li class="breadcrumb-item active">Edit Employee Information</li>
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
                                <h4 class="card-title">Edit Employee Information Form</h4>
                            </div>
                            <div class="col-md-6">
                                <router-link :to="{path:'/details-employee/'+$route.params.id}" class="btn btn-sm btn-info text-light float-right">
                                Back
                                </router-link>
                            </div>
                        </div>
                        
                        <form @submit.prevent="updateEmployeeInfo" class="mt-4">
                            <div class="form-group">
                                <label for="add_department">Name</label>
                                <input 
                                    type="text" 
                                    v-model="form.name" 
                                    class="form-control" 
                                    id="add_department"
                                  
                                    placeholder="Employee name"
                                    name="name"
                                    :class="{ 'is-invalid': form.errors.has('name') }"
                                />
                               <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input 
                                    type="text" 
                                    v-model="form.phone" 
                                    class="form-control" 
                                    id="phone"
                                  
                                    placeholder="Phone number"
                                    name="phone"
                                    :class="{ 'is-invalid': form.errors.has('phone') }"
                                />
                               <has-error :form="form" field="phone"></has-error>
                            </div>
                            <div class="form-group">
                               <label for="department">Department</label>
                                    <select 
                                        name="department" 
                                        v-model="form.department"  
                                        id="department"
                                        :class="{ 'is-invalid': form.errors.has('phone') }"
                                        class="form-control">

                                        <option value="">Select Department</option>
                                        <option v-for="department in allDepartments" :key="department.id" :value="department.id">{{ department.name }}</option>

                                    </select>
                               <has-error :form="form" field="department"></has-error>
                            </div>

                             <div class="form-group">
                                <label for="salary">Salary</label>
                                <input 
                                    type="text" 
                                    v-model="form.salary" 
                                    class="form-control" 
                                    id="salary"
                                  
                                    placeholder="Salary"
                                    name="salary"
                                    :class="{ 'is-invalid': form.errors.has('salary') }"
                                />
                               <has-error :form="form" field="salary"></has-error>
                            </div>

                             <div class="form-group">
                                <label for="qualification">Qualifiaction</label>
                               
                                <textarea 
                                name="qualification" 
                                placeholder="Qualification"
                                v-model="form.qualification" 
                                class="form-control" 
                                id="qualification"
                                :class="{ 'is-invalid': form.errors.has('qualification') }"
                                cols="15" 
                                rows="3"></textarea>
                               <has-error :form="form" field="qualification"></has-error>
                            </div>

                             <div class="form-group">
                                <label for="address">Address</label>
                                
                                <textarea 
                                name="address" 
                                v-model="form.address" 
                                placeholder="Address"
                                class="form-control" 
                                id="address"
                                :class="{ 'is-invalid': form.errors.has('address') }"
                                cols="15" 
                                rows="3"></textarea>
                               <has-error :form="form" field="address"></has-error>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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
    name:'edit-employeeInfo',
    data() {
        return {
            form: new Form({
                name: '',
                phone: '',
                address: '',
                qualification: '',
                salary: '',
                department:''
            }),
            employee:'',
            
        }
    },
    mounted() {
        this.$store.dispatch('fetchDepartments')
        this.editEmployee()
    },
    methods: {
        editEmployee(){
            axios.get(`api/employee/details/${this.$route.params.id}`)
            .then(res => {
                this.form.name = res.data.data.name
                this.form.phone = res.data.data.phone
                this.form.address = res.data.data.address
                this.form.salary = res.data.data.salary
                this.form.department = res.data.data.department_id
                this.form.qualification = res.data.data.qualification
            })
        },
        updateEmployeeInfo(){
            this.form.put(`api/employee/update/${this.$route.params.id}`)
            .then(res => {
                this.$snotify.success(res.data.success)
            })
        }
    },
    computed:{
        allDepartments(){
            return this.$store.getters.getDepartments
        }
    }
}

</script>

<style>

</style>