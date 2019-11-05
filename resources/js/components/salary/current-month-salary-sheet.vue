<template>
   <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Salary</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Salary</a></li>
                    <li class="breadcrumb-item active">Current month all Salary Sheet</li>
                </ol>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Current month all paid salary list
                                </h4>
                            </div>
                           
                        </div>
                    
                        <div class="all-data-table table-responsive">
                            <table class="table table-sm table-hover table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th>Serial</th>
                                    <th>Employee Name</th>
                                    <th>Employee Id</th>
                                    <th>Department</th>
                                    <th>Place</th>
                                    <th>Per month salary</th>
                                    <th>Month</th>
                                    <th>Year</th>  
                                    <th>Paid Amount</th>
                                    <th>Paid date</th>
                                </tr>
                            </thead>
                            <tbody>                               
                                <tr v-for="(currentSalaryList, index) in currentMonthAllSalaryList" :key="currentSalaryList.id" class="text-center">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ currentSalaryList.employee_name }}</td>
                                    <td>{{ currentSalaryList.employee_id }}</td>
                                    <td>{{ currentSalaryList.department }}</td>
                                    <td>{{ currentSalaryList.place }}</td>
                                    <td>{{ currentSalaryList.salary }}</td>
                                    <td>{{ currentSalaryList.month }}</td>
                                    <td>{{ currentSalaryList.year }}</td>
                                    <td>{{ currentSalaryList.paid_amount }}</td>
                                     <td>{{ currentSalaryList.date }}</td>
                                </tr>                               
                            </tbody>
                            </table>
                            <pagination :pagination="pagination" v-if="pagination.last_page > 1" :offset="5"
                                @paginate="fetchAllCurrentMonthSalaryList()">
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
    name:'current-month-salary-sheet',
    data() {
        return {
            currentMonthAllSalaryList : [],
            totalAmount: 0,
           
            pagination:{

                current_page:1
            }
        }
    },
    
    mounted() {
       this.fetchAllCurrentMonthSalaryList() 
    },
    methods: {
        fetchAllCurrentMonthSalaryList(){
            this.$Progress.start()
            axios.get('api/salary/current/month/all/salary/list/?page='+this.pagination.current_page)
            .then(res => {
                
                this.currentMonthAllSalaryList = res.data.data
                this.pagination = res.data.meta
                this.$Progress.finish()
            }).catch(err => {
                console.log(err)
                  this.$Progress.fail()
            })
        },
       
    },
    computed: {
        CountTotalAmount(){
            let countTotalPaidSalary = 0
            this.currentMonthAllSalaryList.forEach(crmasl => {
                countTotalPaidSalary += crmasl.paid_amount
            })
            return  countTotalPaidSalary
        }
    },
}
</script>

<style>

</style>