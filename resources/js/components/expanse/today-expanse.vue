<template>
     <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Expanse</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Expanse</a></li>
                    <li class="breadcrumb-item active">Today expanses</li>
                </ol>
            </div>
           
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-4 text-left">
                                    <h4 class="card-title"> Today all expanse </h4>
                                </div>
                                <div class="col-md-4 text-center">
                                    <h4>Today Total Expanse : <span class="text-danger"> 
                                        {{  todayAmountCount  }}</span>
                                    </h4> 
                                </div>
                                <div class="col-md-4 text-right">
                                    <router-link class="btn btn-sm btn-primary" to="/add-expanse">Add New</router-link>
                                </div>
                            </div>
                        </div>
                        
                        <table class="table table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Serial</th>
                                    <th>Details</th>
                                    <th>Amount</th>
                                    <th>Month</th>
                                </tr>
                            </thead>
                            <tbody>                               
                                <tr v-for="(expanse, index) in expanses" :key="expanse.id" class="text-center">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ expanse.details }}</td>
                                    <td>{{ expanse.amount }}</td>
                                    <td>{{ expanse.date }}</td>
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
    name:'today-expanse',
    data() {
        return {
            expanses:[],
            todayAmountCount:''
        }
    },
    mounted() {
        this.todayAllExpanse()
        this.todayAmountCounts()
    },
    methods: {
        todayAllExpanse(){
            axios.get('api/expanse/today')
            .then(res => {
                this.$Progress.start()
                this.expanses = res.data.data
                this.$Progress.finish()
            }).catch(err => {
                console.log(err)  
                this.$Progress.fail()
            })
        },
        todayAmountCounts(){
            axios.get('api/expanse/today/amount/count')
            .then(res => {
                //console.log(res)
                
                this.todayAmountCount = res.data.todayAmountCount
            })
        }
        
    },
   
    
}
</script>

<style>

</style>