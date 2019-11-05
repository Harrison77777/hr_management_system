<template>
   <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Recruitment</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">All Place & requirements</a></li>
                    <li class="breadcrumb-item active">All Places List</li>
                </ol>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <router-link to="/add-place" class="btn btn-sm float-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i>
                    Add New Place & Requirement
                </router-link>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Places </h4>
                        <table class="table table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Serial</th>
                                    <th>Place name</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                               
                                <tr v-for="(place, index) in places" :key="place.id" class="text-center">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ place.place_name }}</td>
                                    <td>See this place's all requirement leave the details section</td>
                                    <td>
                                        <router-link :to="{path:'/edit-place/'+place.id}" class="btn btn-sm btn-info" href="">
                                            <i class="mdi mdi-lead-pencil"></i>Edit
                                        </router-link>
                                        <router-link :to="{path:'/place-details/'+place.id}" class=" btn btn-sm btn-primary">
                                             <i class="mdi mdi-details"></i> See all requirements
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
    name:'place-requirement',
    data() {
        return {
            places:[]
        }
    },
    mounted() {
      this.fetchAllPlace()
    },
    methods: {
        fetchAllPlace(){
            this.$Progress.start()
            axios.get('api/recruitment/all/place')
            .then(res => {
                this.places = res.data.data
                this.$Progress.finish()
            }).catch(err => {
                console.log(err)
                this.$Progress.fail()
            })
        },
        
    },
   
}
</script>

<style>

</style>