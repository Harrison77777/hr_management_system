<template>
     <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Expanse</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Expanse</a></li>
                    <li class="breadcrumb-item">Previous months salary list</li>
                    <li class="breadcrumb-item active">Salary Sheet Of {{ $route.params.month }}</li>
                </ol>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title"><span class="text-success">{{ $route.params.month }}</span> month's all paid salary list
                                </h4>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="button-area">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="query-field-section">
                                                        <label for=""><h5>Search perticular employee's salary report by Emplyee ID -></h5> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="search-field-section">
                                                        <input v-model="search" placeholder="Search" type="text"
                                                            class="w-50 custom form-control form-control-sm ml-auto float-right" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="all-data-table table-responsive">
                            <table class="table table-sm table-hover table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th>Serial</th>
                                    <th>Employee Name</th>
                                    <th>Employee ID</th>
                                    <th>Department</th>
                                    <th>Place</th>
                                    <th>Photo</th>
                                    <th>Permonth salary</th>
                                    <th>Salary Paid Data</th>
                                    <th>Paid Amount</th>
                                </tr>
                            </thead>
                            <tbody>                               
                                <tr v-for="(salary, index) in allSalaryList" :key="index" class="text-center">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ salary.employee_name }}</td>
                                    <td>{{ salary.employee_id }}</td>
                                    <td>{{ salary.department }}</td>
                                    <td>{{ salary.place }}</td>
                                    <td>
                                        <img class="rounded" :src="salary.photo" height="40" width="40" alt="">
                                    </td>
                                    <td>{{ salary.salary }}</td>
                                    <td>{{ salary.date }}</td>
                                    <td>{{ salary.paid_amount }}</td>
                                </tr>                               
                            </tbody>
                            </table>
                            <pagination :pagination="pagination" v-if="pagination.last_page > 1" :offset="5"
                                @paginate="search === '' ? fetchAllSalarySheetPreticuartMonth() : searchPerticulerEmployeeSalaryReport()">
                            </pagination>
                        </div>
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
    name:'month-wise-salary-sheet',
    data() {
        return {
            allSalaryList:[],
            pagination:{
                current_page:1
            },
            search:'',
            
        }
    },
    watch: {
        search:function(newQuery, oldQuery){
            if (newQuery === '') {
                 this.fetchAllSalarySheetPreticuartMonth()
            }else{
               this.searchPerticulerEmployeeSalaryReport() 
            }
        }
    },
    mounted() {
        this.fetchAllSalarySheetPreticuartMonth()
    },
    methods: {
        fetchAllSalarySheetPreticuartMonth(){
            this.$Progress.start()
            axios.get(`api/salary/particular/month/all/salary/sheet/${this.$route.params.month}/?page=${this.pagination.current_page}`)
            .then(res => {
                this.allSalaryList = res.data.data
                this.pagination = res.data.meta
                this.$Progress.finish()
            }).catch(err => {
                console.log(err) 
                this.$Progress.finish()               
            })
        },
        searchPerticulerEmployeeSalaryReport(){
            this.$Progress.start()
            axios.get(`api/salary/particular/month/particular/employee/salary/sheet/search/${this.$route.params.month}/${this.search}/?page=${this.pagination.current_page}`)
            .then(res => {
                this.allSalaryList = res.data.data
                this.pagination = res.data.meta
                this.$Progress.finish()
            }).catch(err => {
                console.log(err) 
                this.$Progress.finish()               
            })
        },

        
    },
    computed: {
        totalAmountCurrentMonth(){
            let totalSlaryAmount = 0
            this.allSalaryList.forEach(salary=> {
                totalSlaryAmount += salary.paid_amount
            })
            return totalSlaryAmount
        }
    },
}
</script>

<style scoped>
.custom{
    border:1px solid;
    color:black;
}
</style>