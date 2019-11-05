<template>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Reports</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Reports</a></li>
                    <li class="breadcrumb-item active">Report Details</li>
                </ol>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <router-link to="/view-all-reports" class="btn btn-sm float-right hidden-sm-down btn-info"><i class="mdi mdi-plus-circle"></i>
                   Back
                </router-link>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-body">
                        <h3 class="card-title"> Report Details </h3>
                        
                        <h5><strong>Employee Name</strong></h5>
                        <p>{{ report.employee_name }}</p>
                        <h5><strong>Employee ID</strong></h5>
                        <p>{{ report.employee_name }}</p>
                        <h5><strong>Report</strong></h5>
                        <p>{{ report.report }}</p>

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
    name: 'details-report',
    data() {
        return {
            report:''
        }
    },
    mounted() {
        this.fetchReport()
    },
    methods: {
        fetchReport(){
            this.$Progress.start()
            axios.get('api/report/details/'+this.$route.params.id)
            .then(res => {
                this.report = res.data.data
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