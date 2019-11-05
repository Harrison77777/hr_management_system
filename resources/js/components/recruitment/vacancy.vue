<template>
   <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Recruitment</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Vacancy</a></li>
                    <li class="breadcrumb-item active">All Vacancy List</li>
                </ol>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <router-link to="/add-vacancy" class="btn btn-sm float-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i>
                    Add Vacancy
                </router-link>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Vacancy </h4>
                        <table class="table table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Serial</th>
                                    <th>Vacancy name</th>
                                    <th>Total Needle</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                               
                                <tr v-for="(vacancy, index) in vacancies" :key="vacancy.id" class="text-center">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ vacancy.name }}</td>
                                    <td>{{ vacancy.total_needle }}</td>
                                    <td>
                                        <a @click.prevent="deleteVacancy(vacancy.id)" class="btn btn-sm btn-danger" href="">
                                            <i class="mdi mdi-delete"></i>Delete
                                        </a>
                                        <router-link :to="{path:'/edit-vacancy/'+vacancy.id}" class="btn btn-sm btn-info" href="">
                                            <i class="mdi mdi-lead-pencil"></i>Edit
                                        </router-link>
                                        <router-link :to="{path:'/vacancy-details/'+vacancy.id}" class=" btn btn-sm btn-primary">
                                             <i class="mdi mdi-details"></i>Details
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
            vacancies:[]
        }
    },
    mounted() {
      this.fetchAllVacancies()
    },
    methods: {
        fetchAllVacancies(){
            this.$Progress.start()
            axios.get('api/recruitment/all/vacancy')
            .then(res => {
                this.vacancies = res.data.data
                this.$Progress.finish()
            }).catch(err => {
                console.log(err)
                this.$Progress.fail()
            })
        },
        deleteVacancy(vacancyId){
            this.$Progress.start()
            
            axios.delete('api/recruitment/vacancy/delete/'+vacancyId)
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