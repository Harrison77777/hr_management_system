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
                                <router-link to="/all-employee" class="btn btn-sm btn-info text-light float-right">
                                    All Employees
                                </router-link>
                            </div>
                        </div>

                        <form @submit.prevent="storeEmployee">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="name">Full name</label>
                                    <input :class="{'is-invalid': addEmployeeError.nameError}" v-model="addEmployee.name" type="text" class="form-control" id="name" placeholder="Full name">
                                    <div id="aeNameError" class="invalid-feedback "></div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="deparment">Department</label>
                                    <select :class="{'is-invalid': addEmployeeError.departmentError}"   class="form-control" v-model="addEmployee.department" id="deparment">
                                        <option value="">Select Department</option>
                                        <option v-for="department in allDepartments" :key="department.id" :value="department.id">{{ department.name }}</option>  
                                    </select>
                                    <div id="aeDepartmentError" class="invalid-feedback "></div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="place">Place</label>
                                    <div class="input-group">
                                        <input :class="{'is-invalid': addEmployeeError.placeError}" v-model="addEmployee.place" type="text" class="form-control " id="place" placeholder="Employee place">
                                        <div id="aePlaceError" class="invalid-feedback "></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="salary">Salary</label>
                                    <input :class="{'is-invalid': addEmployeeError.salaryError}" v-model="addEmployee.salary" type="text" class="form-control " id="salary" placeholder="Salary" >
                                    <div id="aeSalaryError" class="invalid-feedback "></div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label  for="email">Email</label>
                                    <input :class="{'is-invalid': addEmployeeError.emailError}" v-model="addEmployee.email" type="text" class="form-control " id="email" placeholder="Email address">
                                    <div id="aeEmailError" class="invalid-feedback "></div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="phone">Phone</label>
                                    <input :class="{'is-invalid': addEmployeeError.phoneError}"  v-model="addEmployee.phone" type="text" class="form-control " id="phone" placeholder="Phone number">
                                    <div id="aePhoneError" class="invalid-feedback "></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="qualification">Qualification</label>
                                        <textarea :class="{'is-invalid': addEmployeeError.qualificationError}" class="form-control" v-model="addEmployee.qualification" placeholder="Qualification" id="qualification" cols="15" rows="3"></textarea>
                                        <div id="aeQualificationError" class="invalid-feedback "></div>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea :class="{'is-invalid': addEmployeeError.addressError}" class="form-control " v-model="addEmployee.address" placeholder="Address" id="address" cols="15" rows="3"></textarea>
                                        <div id="aeAddressError" class="invalid-feedback "></div>
                                    </div> 
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                <label for="photo">Employee Photo</label>
                                <input :class="{'is-invalid': addEmployeeError.photoError}"  @change="getPhoto" type="file" class="form-control"  id="photo">
                                <div id="aePhotoError" class="invalid-feedback "></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <img :src="photoPreview"  class="empPhoto" alt="">
                            </div>
                            <button class="btn btn-primary mt-2" type="submit">Submit</button>
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
        name: 'add-employee',
        data() {
            return {

                addEmployee:{
                    name:'',
                    department:'',
                    place:'',
                    salary:'',
                    email:'',
                    phone:'',
                    qualification:'',
                    address:'',
                    photo:''
                },
                photoPreview:'',
                addEmployeeError:{
                    nameError:'',
                    emailError:'',
                    addressError:'',
                    phoneError:'',
                    photoError:'',
                    qualifictionError:'',
                    salaryError:'',
                    placeError:'',
                    departmentError:'',
                }
            }
        },
        mounted() {
     
        this.$store.dispatch('fetchDepartments')
       
        },
        methods: {
            getPhoto(){
                let file = event.target.files[0]
                this.addEmployee.photo = file
                let reader = new FileReader();
                reader.onload = e => {
                    this.photoPreview = e.target.result
                    //console.log(e.target.result)
                }

                reader.readAsDataURL(file);
                
                
            },

            storeEmployee() {
                
              let addEmployeeForm = new FormData()
                addEmployeeForm.append('name', this.addEmployee.name)
                addEmployeeForm.append('department', this.addEmployee.department)
                addEmployeeForm.append('place', this.addEmployee.place)
                addEmployeeForm.append('salary', this.addEmployee.salary)
                addEmployeeForm.append('email', this.addEmployee.email)
                addEmployeeForm.append('phone', this.addEmployee.phone)
                addEmployeeForm.append('qualification', this.addEmployee.qualification)
                addEmployeeForm.append('address', this.addEmployee.address)
                addEmployeeForm.append('photo', this.addEmployee.photo)
                axios.post('api/employee/add',addEmployeeForm)
                .then(res => {
                    this.addEmployee.name = ''
                    this.addEmployee.department = ""
                    this.addEmployee.place = ''
                    this.addEmployee.salary = ''
                    this.addEmployee.email = ''
                    this.addEmployee.phone = ''
                    this.addEmployee.qualification = ''
                    this.addEmployee.address = ''
                    this.addEmployee.photo = ''
                    this.photoPreview = ''

                    this.$snotify.success(res.data.success)

                        this.addEmployeeError.nameError = ''
                        document.getElementById('aeNameError').innerHTML = ''

                        this.addEmployeeError.departmentError = ''
                        document.getElementById('aeDepartmentError').innerHTML = ''

                        this.addEmployeeError.placeError = ''
                        document.getElementById('aePlaceError').innerHTML = ''

                         this.addEmployeeError.salaryError = ''
                        document.getElementById('aeSalaryError').innerHTML = ''

                         this.addEmployeeError.emailError = ''
                        document.getElementById('aeEmailError').innerHTML = ''

                        this.addEmployeeError.phoneError = ''
                        document.getElementById('aePhoneError').innerHTML = ''

                        this.addEmployeeError.qualificationError = ''
                        document.getElementById('aeQualificationError').innerHTML = ''

                        this.addEmployeeError.addressError = ''
                        document.getElementById('aeAddressError').innerHTML = ''

                        this.addEmployeeError.photoError = ''
                        document.getElementById('aePhotoError').innerHTML = ''
                        document.getElementById('photo').innerHTML = ''
                    
                }).catch(err => {
               
                    let getAddEmpError = err.response.data.errors
                    
                    //console.log(getAddEmpError)

                    if (getAddEmpError.name) {
                        this.addEmployeeError.nameError = getAddEmpError.name
                      
                        document.getElementById('aeNameError').innerHTML = getAddEmpError.name[0]
                    }else{
                        this.addEmployeeError.nameError = ''
                        document.getElementById('aeNameError').innerHTML = ''
                    }

                    if (getAddEmpError.department) {
                        this.addEmployeeError.departmentError = getAddEmpError.department
                        document.getElementById('aeDepartmentError').innerHTML = getAddEmpError.department[0]
                        
                    }else{
                        this.addEmployeeError.departmentError = ''
                        document.getElementById('aeDepartmentError').innerHTML = ''
                    }

                    if (getAddEmpError.place) {
                        this.addEmployeeError.placeError = getAddEmpError.place
                        document.getElementById('aePlaceError').innerHTML = getAddEmpError.place[0]
                        
                    }else{
                        this.addEmployeeError.placeError = ''
                        document.getElementById('aePlaceError').innerHTML = ''
                    }

                    if (getAddEmpError.salary) {
                        this.addEmployeeError.salaryError = getAddEmpError.salary
                        document.getElementById('aeSalaryError').innerHTML = getAddEmpError.salary[0]
                        
                    }else{
                        this.addEmployeeError.salaryError = ''
                        document.getElementById('aeSalaryError').innerHTML = ''
                    }

                    if (getAddEmpError.email) {
                        this.addEmployeeError.emailError = getAddEmpError.email
                        document.getElementById('aeEmailError').innerHTML = getAddEmpError.email[0]
                        
                    }else{
                        this.addEmployeeError.emailError = ''
                        document.getElementById('aeEmailError').innerHTML = ''
                    }

                    if (getAddEmpError.phone) {
                        this.addEmployeeError.phoneError = getAddEmpError.phone
                        document.getElementById('aePhoneError').innerHTML = getAddEmpError.phone[0]
                        
                    }else{
                        this.addEmployeeError.phoneError = ''
                        document.getElementById('aePhoneError').innerHTML = ''
                    }

                    if (getAddEmpError.qualification) {
                        this.addEmployeeError.qualificationError = getAddEmpError.qualification
                        document.getElementById('aeQualificationError').innerHTML = getAddEmpError.qualification[0]
                        
                    }else{
                        this.addEmployeeError.qualificationError = ''
                        document.getElementById('aeQualificationError').innerHTML = ''
                    }

                    if (getAddEmpError.address) {
                        this.addEmployeeError.addressError = getAddEmpError.address
                        document.getElementById('aeAddressError').innerHTML = getAddEmpError.address[0]
                        
                    }else{
                        this.addEmployeeError.addressError = ''
                        document.getElementById('aeAddressError').innerHTML = ''
                    }

                    if (getAddEmpError.photo) {
                        this.addEmployeeError.photoError = getAddEmpError.photo
                        document.getElementById('aePhotoError').innerHTML = getAddEmpError.photo[0]
                        
                    }else{
                        this.addEmployeeError.photoError = ''
                        document.getElementById('aePhotoError').innerHTML = ''
                    }

                })
            }
        },
        computed:{
            allDepartments(){
               return this.$store.getters.getDepartments
            }
        },
    }
</script>

<style>
.empPhoto{
    margin-top: 3px;
    height: 250px;
    width: 250px;
    border: 1px solid gray;
}
.invalid-feedback{
    display: block!important;
}
</style>