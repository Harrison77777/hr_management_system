<template>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Project & Task Details</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View project & tests</a></li>
                    <li class="breadcrumb-item active">View task and change status</li>
                </ol>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <router-link to="/all-project" class="btn btn-sm float-right hidden-sm-down btn-success"><i
                        class="mdi mdi-plus-circle"></i>
                    Back
                </router-link>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-title p-2">
                        <div class="row">
                            <div class="col-md-6">
                                 <h4>Project Details </h4>
                            </div>
                            <div class="col-md-6">
                               <span>Change completation status</span>  
                               <input 
                                @change="changeCompetitionStatus(project.id, project.completion_status)" 
                                :checked="project.completion_status == 1" 
                                class="form-check-inline form-check-label" style="height:20px;width:20px;" type="checkbox" name="" id=""
                                v-model="project.completion_status"
                                /> 
                            </div>
                        </div>
                       
                    </div>
                    <div class="card-body">
                        <div class="project-detaisl-area">
                            <div class="project-details">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6> Project Name :
                                                <strong> <span style="font-size:15px;">
                                                        {{ project.project_name }}
                                                    </span></strong>
                                            </h6>
                                            <h6> Main contibutor :
                                                <strong><span style="font-size:15px;">
                                                        {{ project.main_contributor }}
                                                    </span></strong>
                                            </h6>

                                            <h6> Clent/Company's name :
                                                <strong><span style="font-size:15px;">
                                                        {{ project.client_name }}
                                                    </span></strong>
                                            </h6>
                                        </div>
                                        <div class="col-md-6">

                                            <h6>Responsible Team :
                                                <strong><span style="font-size:15px;">
                                                        {{ project.responsible_team }}
                                                    </span></strong>
                                            </h6>

                                            <h6>Project Budget :
                                                <strong><span style="font-size:15px;">
                                                        {{ project.project_budget }}
                                                    </span></strong>
                                            </h6>

                                            <h6> Deadline :
                                                <strong><span style="font-size:15px;">
                                                        {{ project.project_length }}
                                                    </span></strong>
                                            </h6>

                                            <h6 v-if="project.completion_status"> Completation Status :
                                                <strong><span class="py-1 bg-success px-2 text-white"
                                                        style="font-size:15px;">
                                                        Completed
                                                    </span></strong>
                                            </h6>
                                            <h6 v-else> Completation Status :
                                                <strong><span class="py-1 bg-danger px-2 text-white"
                                                        style="font-size:15px;">
                                                        Running
                                                    </span></strong>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="add-task-area">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 offset-1">
                                    <div class="add-task-form pb-2">
                                        <div class="heading-section text-left">
                                            <h4>Add new task in this project</h4>
                                        </div>
                                        <form @submit.prevent="addTask">
                                            <div class="form-group m-0">
                                                <label>Task Description</label>
                                                <textarea type="text" v-model="form.task" class="form-control"
                                                    placeholder="Task Description " name="task"
                                                    :class="{ 'is-invalid': form.errors.has('task') }" cols="15"
                                                    rows="3">
                                            </textarea>
                                                <has-error :form="form" field="task"></has-error>
                                            </div>
                                            <button class="btn btn-sm btn-primary mt-1" type="submit">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-2">
                    <div class="all-tasks">
                        <div class="heading-section">
                            <h4>All task of {{ project.project_name }}</h4>
                        </div>

                        <p v-for="(task, index) in project.tasks" :key="index"><input style="height: 15px; width:15px; margin-top: 10px;" v-model="task.is_completed" :checked="task.is_completed" @change="changeIsCompleted(task.id,task.is_completed)" type="checkbox"> <strong style="font-size:16px;">{{task.task_name}} <i v-if="task.is_completed" class="mdi mdi-check-circle text-success"></i><i v-else class="mdi mdi-close-circle text-danger"></i></strong>
                        </p>
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
        name: 'all-tasks-and-change-status.vue',
        data() {
            return {
                project: [],
                form: new Form({
                    task: ''
                })
            }
        },
        mounted() {
            this.getProjectDetailsAndTask()
        },
        methods: {
            getProjectDetailsAndTask() {
                axios.get('api/project/details/task/' + this.$route.params.id)
                    .then(res => {
                        this.$Progress.start()
                        this.project = res.data.data
                        this.$Progress.finish()
                    }).catch(err => {
                        //console.log(err.response)
                        this.$Progress.fail()
                    })
            },

            addTask() {
                this.form.post('api/project/add/task/' + this.$route.params.id)
                    .then(res => {
                        this.$Progress.start()
                        this.$snotify.success(res.data.success)
                        this.form.task = ''
                        this.getProjectDetailsAndTask()
                        this.$Progress.finish()
                    }).catch(err => {
                        console.log(err.response)
                        this.$Progress.fail()
                    })
            },
            changeIsCompleted(taskId, is_completed){
               
               axios.put('api/project/change/is_completed/'+taskId, {
                   is_completed : is_completed
               }).then(res => {
                   this.$Progress.start()
                   this.$snotify.success(res.data.success)
                   this.$Progress.finish()
               }).catch(err => {
                    console.log(err.response)
                    this.$Progress.fail()
                })
            },
            changeCompetitionStatus(projectId, completion_status){
                axios.put('api/project/change/competition/status/'+projectId, {
                   completion_status : completion_status
               }).then(res => {
                   this.$Progress.start()
                   console.log(res.data.success)

                   
                   this.$snotify.success(res.data.success)
                   this.$Progress.finish()
               }).catch(err => {
                    console.log(err.response)
                    this.$Progress.fail()
                })
            }
        },
    }
</script>

<style scoped>
    .card-body {
        padding: 0rem;
    }
</style>