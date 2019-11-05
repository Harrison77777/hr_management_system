<template>
  <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Recruitment</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">All Places</a></li>
                    <li class="breadcrumb-item active">Place Details</li>
                </ol>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <router-link to="/all-place" class="btn btn-sm float-right hidden-sm-down btn-info"><i class="mdi mdi-plus-circle"></i>
                   Back
                </router-link>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-body">
                        <h3 class="card-title"> Place & Requirements Details </h3>
                        
                        <h5><strong>Place Name</strong></h5>
                        <p>{{ place.place_name }}</p>
                        <h5><strong>Education Qualification</strong></h5>
                        <p>{{ place.education_qualification }}</p>
                        <h5><strong>Skill Requirements</strong></h5>
                        <p>{{ place.skill_qualification }}</p>

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
            place: '',
        }
    },
    mounted() {
        this.vacancyDetails()
    },
    methods: {
       vacancyDetails(){
           this.$Progress.start()
           axios.get('api/recruitment/place/details/'+this.$route.params.id)
           .then(res => {
               this.place = res.data.data
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