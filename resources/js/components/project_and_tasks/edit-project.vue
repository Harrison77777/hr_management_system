
  <template>
  <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Project & Task</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">All project</li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit project information</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Edit Project Form</h4>
                            </div>
                            <div class="col-md-6">
                                   <router-link to="/all-project" class="btn btn-sm float-right hidden-sm-down btn-info">
                                    Back
                                </router-link>
                            </div>
                        </div>
                        
                        <form @submit.prevent="updateProject" class="mt-4">

                            <div class="form-group">
                                <label for="add_department">Project name</label>
                                <input 
                                    type="text" 
                                    v-model="form.project_name" 
                                    class="form-control" 
                                    id="vacancName"
                                  
                                    placeholder="Project name"
                                    name="project_name"
                                    :class="{ 'is-invalid': form.errors.has('project_name') }"
                                />
                               <has-error :form="form" field="project_name"></has-error>
                            </div>

                            <div class="form-group">
                                <label>Main contributor</label>
                                <input 
                                    type="text" 
                                    v-model="form.main_contributor" 
                                    class="form-control" 
                                    placeholder="Main contributor"
                                    name="main_contributor"
                                    :class="{ 'is-invalid': form.errors.has('main_contributor') }"
                                />
                               <has-error :form="form" field="main_contributor"></has-error>
                            </div>

                            <div class="form-group">
                                <label>Client/Company name</label>
                                <input 
                                    type="text" 
                                    v-model="form.client_name" 
                                    class="form-control" 
                                    placeholder="Client/company name"
                                    name="client_name"
                                    :class="{ 'is-invalid': form.errors.has('client_name') }"
                                />
                               <has-error :form="form" field="client_name"></has-error>
                            </div>

                            <div class="form-group">
                                <label>Project Budget</label>
                                <input 
                                    type="text" 
                                    v-model="form.project_budget" 
                                    class="form-control" 
                                    placeholder="Project Budget"
                                    name="project_budget"
                                    :class="{ 'is-invalid': form.errors.has('project_budget') }"
                                />
                               <has-error :form="form" field="project_budget"></has-error>
                            </div>

                            <div class="form-group">
                                <label>Project deadline </label>
                                <input 
                                    type="text" 
                                    v-model="form.project_length" 
                                    class="form-control" 
                                    placeholder="Project deadline"
                                    name="project_length"
                                    :class="{ 'is-invalid': form.errors.has('project_length') }"
                                />
                               <has-error :form="form" field="project_length"></has-error>
                            </div>


                            <div class="form-group">
                                <label>Responsible team </label>
                                <input 
                                    type="text" 
                                    v-model="form.responsible_team" 
                                    class="form-control" 
                                    placeholder="Responsible team"
                                    name="responsible_team"
                                    :class="{ 'is-invalid': form.errors.has('responsible_team') }"
                                />
                               <has-error :form="form" field="responsible_team"></has-error>
                            </div>

                            <div class="form-group">
                                <label>Project short brief (Optional)</label>
                                <textarea 
                                    id="tinymce"
                                    type="text" 
                                    v-model="form.project_brief" 
                                    class="form-control" 
                                    placeholder="Project short brief"
                                    name="project_brief"
                                    :class="{ 'is-invalid': form.errors.has('project_brief') }"
                                    cols="15"
                                    rows="5"
                                    >
                                </textarea>
                               <has-error :form="form" field="project_brief"></has-error>
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
    name:'edit-project',
    data() {
        return {
            form: new Form({
                project_name: '',
                main_contributor:'',
                client_name:'',
                project_budget:'',
                project_brief:'',
                project_length: '',
                responsible_team: ''
            }),
        }
    },
    mounted() {
        
        this.getEditProjectInfo()
        
    },
    methods: {
        getEditProjectInfo(){
            this.$Progress.start()
            axios.get('api/project/edit/info/'+this.$route.params.id)
            .then(res => {
                this.form.project_name = res.data.data.project_name
                this.form.main_contributor =res.data.data.main_contributor
                this.form.client_name = res.data.data.client_name
                this.form.project_budget = res.data.data.project_budget
                this.form.project_brief = res.data.data.project_brief
                this.form.project_length = res.data.data.project_length
                this.form.responsible_team = res.data.data.responsible_team
                this.$Progress.finish()
            }).catch(err => {
                console.log(err.response)
                this.$Progress.fail()
            })
        },

        updateProject(){
            this.$Progress.start()
            this.form.put('api/project/update/'+this.$route.params.id)
            .then(res => {
                // console.log(res)
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

<style>

</style>