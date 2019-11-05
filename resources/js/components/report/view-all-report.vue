<template>
     <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Reports</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Reports</a></li>
                    <li class="breadcrumb-item active">View All Reports</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All All Reports </h4>
                        <table class="table table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Serial</th>
                                    <th>Employee Name</th>
                                    <th>Employee Id</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody v-if="checkReport == 1">                               
                                <tr v-for="(report, index) in reports" :key="report.id" class="text-center">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ report.employee_name }}</td>
                                    <td>{{ report.employee_id }}</td>
                                    <td>
                                        <a @click.prevent="deleteReport(report.id)" class="btn btn-sm btn-danger" href="">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                        <router-link :to="{path:'/details-report/'+report.id}" class=" btn btn-sm btn-info">
                                             <i class="mdi mdi-details"></i> View report details
                                        </router-link>
                                    </td>
                                </tr>
                                                              
                            </tbody>
                            <tbody v-else>                               
                                <tr class="text-center">
                                    <td colspan="4">There is no reports</td>
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
    name: 'view-all-report',
    data() {
        return {
            reports:[],
        }
    },
    mounted() {
       this.fetchAllReports() 
    },
    methods: {
        fetchAllReports(){
            this.$Progress.start()
            axios.get('api/report/all')
            .then(res => {
                this.reports = res.data.data
                this.$Progress.finish()
            }).catch(err => {
                console.log(err)
                this.$Progress.fail()
            })
        },
        deleteReport(reportId){
            axios.delete('api/report/delete/'+reportId)
            .then(res => {
                this.fetchAllReports() 
                this.$snotify.success(res.data.success)
            }).catch(err => {
                console.log(err) 
            })
        }
    },

    computed: {
        checkReport(){
            if (this.reports < 1) {
                return 0
            }else{
                return 1
            }
        }
    },
}
</script>

<style>

</style>