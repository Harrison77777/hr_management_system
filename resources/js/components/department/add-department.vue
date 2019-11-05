<template>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Department</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Department</a></li>
                    <li class="breadcrumb-item active">Add Department Section</li>
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
                                <h4 class="card-title">Add Department Form</h4>
                            </div>
                            <div class="col-md-6">
                                <router-link to="/all-departments" class="btn btn-sm btn-info text-light float-right">
                                All Employees
                                </router-link>
                            </div>
                        </div>
                        
                        <form @submit.prevent="addDepartment" class="mt-4">
                            <div class="form-group">
                                <label for="add_department">Department name</label>
                                <input 
                                    type="text" 
                                    v-model="form.name" 
                                    class="form-control" 
                                    id="add_department"
                                  
                                    placeholder="Department name"
                                    name="name"
                                    :class="{ 'is-invalid': form.errors.has('name') }"
                                />
                               <has-error :form="form" field="name"></has-error>
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
        name: 'add-department',
        data() {
            return {
                form : new Form({
                    name: '',
                })
            }
        },
        methods: {
            addDepartment(){
               this.form.post('api/department/add')
               .then(res => {
                   this.form.name = ''
                    this.$snotify.success('Department addes successfully :)')
               }).catch(err => {
                   console.log(err)
               })
                
            }
        },
    }
</script>

<style>

</style>