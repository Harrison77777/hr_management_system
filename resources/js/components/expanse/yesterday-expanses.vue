<template>
     <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Expanse</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Expanse</a></li>
                    <li class="breadcrumb-item active">Yesterday expanses</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <h4 class="card-title"> Yesterday all expanse </h4>
                                </div>
                                <div class="col-md-6 text-right">
                                    <h4>Yesterday Total Expanse amount : <span class="text-danger"> 
                                        {{  yesterdayAmountCount  }}</span>
                                    </h4> 
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
    name:'yesterday-expanse',
    data() {
        return {
            expanses:[],
            yesterdayAmountCount: ''
        }
    },
    mounted() {
        this.yesterdayAllExpanse()
        this.yesterdayAmountCounts()
    },
    methods: {
        yesterdayAllExpanse(){
            axios.get('api/expanse/yesterday')
            .then(res => {
                this.$Progress.start()
                this.expanses = res.data.data
                this.$Progress.finish()
            }).catch(err => {
                console.log(err)  
                this.$Progress.fail()
            })
        },
         yesterdayAmountCounts(){
            axios.get('api/expanse/yesterday/amount/count')
            .then(res => {
                //console.log(res)
                
                this.yesterdayAmountCount = res.data.yesterdayAmountCount
            })
        }
        
    },
  
    
}
</script>

<style>

</style>