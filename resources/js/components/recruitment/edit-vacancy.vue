<template>
  <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Recruitment</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Vacancy</a></li>
                    <li class="breadcrumb-item active">Edit Vacancy Section</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Edit Vacancy Form</h4>
                            </div>
                            <div class="col-md-6">
                                   <router-link to="/vacancy" class="btn btn-sm float-right hidden-sm-down btn-info">
                                    Back
                                </router-link>
                            </div>
                        </div>
                        
                        <form @submit.prevent="editVacancy" class="mt-4">
                            <div class="form-group">
                                <label for="add_department">Vacancy name</label>
                                <input 
                                    type="text" 
                                    v-model="form.name" 
                                    class="form-control" 
                                    id="vacancName"
                                  
                                    placeholder="Vacancy name"
                                    name="name"
                                    :class="{ 'is-invalid': form.errors.has('name') }"
                                />
                               <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Total Needle</label>
                                <input 
                                    type="text" 
                                    v-model="form.total_needle" 
                                    class="form-control" 
                                    placeholder="Total needle number"
                                    name="total_needle"
                                    :class="{ 'is-invalid': form.errors.has('total_needle') }"
                                />
                               <has-error :form="form" field="total_needle"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Education requirement</label>
                                <textarea 
                                    id="tinymce"
                                    type="text" 
                                    v-model="form.education_requirement" 
                                    class="form-control" 
                                    placeholder="Education requirement"
                                    name="education_requirement"
                                    :class="{ 'is-invalid': form.errors.has('education_requirement') }"
                                    cols="15"
                                    rows="5"
                                    >
                                </textarea>
                               <has-error :form="form" field="education_requirement"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Skill requirement</label>
                                <textarea 
                                    id="tinymce"
                                    type="text" 
                                    v-model="form.skill_requirement" 
                                    class="form-control" 
                                    placeholder="Skill requeirement"
                                    name="skill_requirement"
                                    :class="{ 'is-invalid': form.errors.has('skill_requirement') }"
                                    cols="15"
                                    rows="5"
                                    >
                                </textarea>
                               <has-error :form="form" field="skill_requirement"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Company address</label>
                                <textarea 
                                    id="tinymce"
                                    type="text" 
                                    v-model="form.company_address" 
                                    class="form-control" 
                                    placeholder="Skill requeirement"
                                    name="company_address"
                                    :class="{ 'is-invalid': form.errors.has('company_address') }"
                                    cols="15"
                                    rows="5"
                                    >
                                </textarea>
                               <has-error :form="form" field="company_address"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Company mail address</label>
                                <input 
                                 
                                    type="text" 
                                    v-model="form.email" 
                                    class="form-control" 
                                    placeholder="Company mail address"
                                    name="email"
                                    :class="{ 'is-invalid': form.errors.has('email') }"
                                    
                                    >
                               
                               <has-error :form="form" field="email"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Opportunities</label>
                                <textarea 
                                 
                                    type="text" 
                                    v-model="form.all_opportunities" 
                                    class="form-control" 
                                    placeholder="All opportunities"
                                    name="all_opportunities"
                                    :class="{ 'is-invalid': form.errors.has('all_opportunities') }"
                                    cols="10"
                                    rows="3"
                                    >
                                </textarea>
                               <has-error :form="form" field="all_opportunities"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Salary Range</label>
                                <input 
                                    type="text" 
                                    v-model="form.salary_range" 
                                    class="form-control" 
                                    placeholder="Salary range"
                                    name="salary_range"
                                    :class="{ 'is-invalid': form.errors.has('salary_range') }"
                                    >
                               
                               <has-error :form="form" field="salary_range"></has-error>
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
    name:'edit-vacancy',
    data() {
        return {
            form: new Form({
                name : '',
                total_needle: '',
                education_requirement: '',
                skill_requirement: '',
                all_opportunities: '',
                company_address:'',
                email:'',
                salary_range:'',
                opportunities:'',
            }),
        }
    },
    mounted() {
        
        this.fetchVacancyForEdit()
        
    },
    methods: {
        editVacancy(){
            this.$Progress.start()
            this.form.put('api/recruitment/vacancy/update/'+this.$route.params.id)
            .then(res => {

                console.log(res)
                this.$Progress.finish()
                this.$snotify.success(res.data.success, 'Successful:)')
            }).catch(err => {
                console.log(err)
                this.$Progress.fail()
            })
        
            
        },
        fetchVacancyForEdit(){
            this.$Progress.start()
            axios.get('api/recruitment/vacancy/edit/info/'+this.$route.params.id)
            .then(res => {
                console.log(res);
                
                this.form.salary_range = res.data.data.salary_range
                this.form.name = res.data.data.name
                this.form.education_requirement = res.data.data.education_requirement
                this.form.skill_requirement = res.data.data.skill_requirement
                this.form.company_address = res.data.data.company_address
                this.form.email = res.data.data.company_mail_address
                this.form.all_opportunities = res.data.data.all_opportunities
                this.form.total_needle = res.data.data.needle_number
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