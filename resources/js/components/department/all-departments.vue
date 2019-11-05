<template>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Department</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Department</a></li>
                    <li class="breadcrumb-item active">All Departments Section</li>
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
                        <h4 class="card-title">All Departments </h4>
                        <table class="table table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Total Employes</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                               
                                <tr v-for="(department, index) in allDepartments" :key="department.id" class="text-center">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ department.name }}</td>
                                    <td>10</td>
                                    <td>
                                        <a @click.prevent="deleteDepartment(department.id)" class="btn btn-sm btn-danger" href="">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                        <router-link :to="{path:'/details-department/'+department.id}" class=" btn btn-sm btn-info">
                                             <i class="mdi mdi-details"></i>
                                        </router-link>
                                    </td>
                                </tr>                               
                            </tbody>
                        </table>
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
    name: 'all-departments',
    data() {
        return {
            
        }
    },
    mounted() {
        this.$Progress.start()
        this.$store.dispatch('fetchDepartments')
        this.$Progress.finish()
    },
    methods: {
        deleteDepartment(departmentId){
            
          axios.delete(`api/department/delete/${departmentId}`)
          .then(res => {
              this.$snotify.success(res.data)
              this.$store.dispatch('fetchDepartments')
          })
    
        }
    },
    computed: {
        allDepartments(){
          return this.$store.getters.getDepartments 
        }
    },
}
</script>

<style>

</style>