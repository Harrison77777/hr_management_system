<template>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Expanse</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Expanse</a></li>
                    <li class="breadcrumb-item active">Current month all expanses</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Current month all expanses list
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="card-title text-right">Current month total amount: <span class="text-danger">{{ currentMonthTotalExpanseAmount }}.00</span>
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
                                                        <label for=""><h5>Search By</h5> </label>
                                                        <select class=" form-control form-control-sm w-50"
                                                            v-model="query" id="">
                                                            <option value="date">Date</option>
                                                            <option value="amount">Amount</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="search-field-section">
                                                        <input v-model="search" placeholder="Search" type="text"
                                                            class="w-50 form-control form-control-sm ml-auto float-right" />
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
                                    <th>Details</th>
                                    <th>Amount</th>
                                    <th>Month</th>
                                </tr>
                            </thead>
                            <tbody>                               
                                <tr v-for="(expanse, index) in currentMonthExpanses" :key="expanse.id" class="text-center">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ expanse.details }}</td>
                                    <td>{{ expanse.amount }}</td>
                                    <td>{{ expanse.date }}</td>
                                </tr>                               
                            </tbody>
                            </table>
                            <pagination :pagination="pagination" v-if="pagination.last_page > 1" :offset="5"
                                @paginate="search === '' ? fetchAllCurrentMonthExpansess() : searchExpanses()">
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
        data() {
            return {

                currentMonthExpanses: [],
                pagination: {
                    current_page: 1
                },
                query: 'date',
                search: '',
                currentMonthTotalExpanseAmount: ''
            }
        },
        watch: {
            search: function (newQuery, oldQuery) {
                if (newQuery === '') {
                    this.fetchAllCurrentMonthExpansess()
                } else {
                    this.searchExpanses()
                }
            }
        },
        mounted() {
            this.fetchAllCurrentMonthExpansess()
            this.currentmonthTotalExpanseAmountCounts()
        },
        methods: {
            fetchAllCurrentMonthExpansess() {
                this.$Progress.start()
                axios.get('api/expanse/current/month?page='+this.pagination.current_page)
                    .then(res => {
                        this.currentMonthExpanses = res.data.data
                        this.pagination = res.data.meta
                        this.$Progress.finish()
                    }).catch(err => {
                        console.log(err)
                        this.$Progress.fail()
                    })
            },
             searchExpanses() {
                this.$Progress.start()
                axios.get('api/expanse/current/month/search/' + this.query + '/' + this.search  + '?page=' + this.pagination.current_page)
                    .then(res => {
                       
                        this.currentMonthExpanses = res.data.data
                        this.pagination = res.data.meta
                        this.$Progress.finish()

                    }).catch(err => {
                        console.log(err);
                        this.$Progress.fail()
                    })
            },
            currentmonthTotalExpanseAmountCounts(){
                axios.get('api/expanse/current/month/amount/count')
                .then(res => {
                //console.log(res)
                
                this.currentMonthTotalExpanseAmount = res.data.currentMonthAmountCount
                })
            }
        },
        
    }
</script>

<style>

</style>