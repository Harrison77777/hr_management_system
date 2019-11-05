<template>
   <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Recruitment</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Projects</a></li>
                    <li class="breadcrumb-item active">All Projects List</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Running & Completed Projects </h4>
                        <table class="table table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Serial</th>
                                    <th>Project name</th>
                                    <th>Main conributor</th>
                                    <th>Responsible team</th>
                                    <th>Client name</th>
                                    <th>Status</th>
                                    <th>Deadline</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                               
                                <tr v-for="(project, index) in projects" :key="project.id" class="text-center">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ project.project_name }}</td>
                                    <td>{{ project.main_contributor }}</td>
                                    <td>{{ project.responsible_team }}</td>
                                    <td>{{ project.client_name }}</td>
                                    <td v-if="project.completion_status == 0">
                                        <span class='px-2 py-1 rounded text-white bg-danger'>Running</span>
                                    </td>
                                    <td v-else>
                                        <span class='px-2 py-1 rounded text-white bg-success'>Completed</span>
                                    </td>
   
                                    <td>{{ project.project_length }}</td>
                                    <td>
                                        <a @click.prevent="projectDaliveryCompleted(project.id)" class="btn btn-sm btn-danger" href="">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                        <router-link :to="{path:'/edit-project/'+project.id}" class="btn btn-sm btn-info" href="">
                                            <i class="mdi mdi-lead-pencil"></i>
                                        </router-link>
                                        <router-link :to="{path:'/all-tasks-and-change-status/'+project.id}" class=" btn btn-sm btn-primary">
                                             <i class="mdi mdi-details"></i>View Tasks & Change status
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
    name:'vacancy',
    data() {
        return {
            projects:[]
        }
    },
    mounted() {
      this.fetchAllProjects()
    },
    methods: {

        fetchAllProjects(){
            this.$Progress.start()
            axios.get('api/project/all')
            .then(res => {
                this.projects = res.data.data
                this.$Progress.finish()
            }).catch(err => {
                console.log(err)
                this.$Progress.fail()
            })
        },

        projectDaliveryCompleted(projectId){
            this.$Progress.start()
            
            axios.delete('api/project/completed/'+projectId)
            .then(res => {
                this.$snotify.success(res.data.success)
                this.fetchAllVacancies()
                this.$Progress.finish()
            }).catch(err => {
                console.log(err)
                this.$Progress.fail()
            })
        }
    },
   
}
</script>

<style>

</style>