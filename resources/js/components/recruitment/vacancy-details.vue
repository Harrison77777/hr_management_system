<template>
  <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Recruitment</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Vacancy</a></li>
                    <li class="breadcrumb-item active">Vacancy Details</li>
                </ol>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <router-link to="/vacancy" class="btn btn-sm float-right hidden-sm-down btn-info"><i class="mdi mdi-plus-circle"></i>
                   Back
                </router-link>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-body">
                        <h3 class="card-title"> Vacancy Details </h3>
                        
                        <h5><strong>Vacancy Name</strong></h5>
                        <p>{{ vacancy.name }}</p>
                        <h5><strong>Total Needle</strong></h5>
                        <p>{{ vacancy.needle_number }}</p>
                        <h5><strong>Education Requirement</strong></h5>
                        <p>{{ vacancy.education_requirement }}</p>
                        <h5><strong>Skill Requirement</strong></h5>
                        <p>{{ vacancy.skill_requirement }}</p>
                        <h5><strong>All Opportunities</strong></h5>
                        <p>{{ vacancy.all_opportunities }}</p>
                        <h5><strong>Company Address</strong></h5>
                        <p>{{ vacancy.company_address }}</p>
                        <h5><strong>Company Mail Address</strong></h5>
                        <p>{{ vacancy.company_mail_address }}</p>
                        <h5><strong>Salary Range</strong></h5>
                       <strong> <p>{{ vacancy.salary_range }} </p></strong>
                        
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
    name:'vacancy-details',
    data() {
        return {
            vacancy: '',
        }
    },
    mounted() {
        this.vacancyDetails()
    },
    methods: {
       vacancyDetails(){
           this.$Progress.start()
           axios.get('api/recruitment/vacancy/details/'+this.$route.params.id)
           .then(res => {
               this.vacancy = res.data.data
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