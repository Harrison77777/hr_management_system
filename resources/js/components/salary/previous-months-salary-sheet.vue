<template>
  <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Salary Saction</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Salary</a></li>
                    <li class="breadcrumb-item active">Departments Department wise salary</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Select Month and Check salary Sheet</h4>
                        <div class="row">
                            
                            <div v-for="month in previousAllMonth" :key="month.month" class="col-md-3">
                                <div class="all-department">
                                    <router-link :to="{path:'/month/wise/salary/sheet/'+month.month}">
                                        <div class="single-department-area  text-center p-2">
                                            <h4>{{ month.month }}</h4>
                                        </div>
                                    </router-link>
                                </div>
                            </div>
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
    name:'previous-months-salary-sheet',
    data() {
        return {
            previousAllMonth:[]
        }

    },
    mounted() {
        this.getPreviousallMonths()
    },
    methods: {
        getPreviousallMonths(){
            axios.get('api/salary/previous/all/month/for/salary/sheet')
            .then(res => {
                this.previousAllMonth = res.data.data
            })
        }
    },

}
</script>

<style scoped>
    .single-department-area {
    border: 1px solid #0785f1;
}
</style>