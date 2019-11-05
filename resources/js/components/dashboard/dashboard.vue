<template>
    <div>
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
               
            </div>

            <div class="row">
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Employees</h4>
                            <div class="text-right">
                                <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> {{ counts.totalEmployees }}</h2>
                                <span class="text-muted">Total Employee</span>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Department</h4>
                            <div class="text-right">
                                <h2 class="font-light mb-0"><i class="ti-arrow-up text-info"></i> {{ counts.totalDepartment }}</h2>
                                <span class="text-muted">Total Departments</span>
                            </div>
                           
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Projects</h4>
                            <div class="text-right">
                                <h2 class="font-light mb-0"><i class="ti-arrow-up text-purple"></i> {{ counts.totalRunningProject }}</h2>
                                <span class="text-muted">Total Running Projects</span>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Expanses</h4>
                            <div class="text-right">
                                <h2 class="font-light mb-0"><i class="ti-arrow-up text-danger"></i> {{ counts.todayTotalExpanse }}</h2>
                                <span class="text-muted">Todays Total Expanses (Running)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <vue-progress-bar></vue-progress-bar>
    </div>
</template>

<script>
    export default {
        name:'dashboard',
        data() {
            return {
                counts:[],
            }
        },
        mounted() {
           this.fetchAllCounts() 
        },
        methods: {
            fetchAllCounts(){
                this.$Progress.start()
                axios.get('api/dashboard/counts')
                .then(res => {
                    this.counts = res.data
                    this.$Progress.finish()
                })
            }
        },
    }
</script>

<style>

</style>