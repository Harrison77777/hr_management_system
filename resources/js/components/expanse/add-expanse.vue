<template>
  <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Expanse</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Expanse</a></li>
                    <li class="breadcrumb-item active">Add Expanse Section</li>
                </ol>
            </div>
           
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Add Expanse Form</h4>
                            </div>
                            <div class="col-md-6">
                                <router-link to="/today-expanses" class="btn btn-sm btn-info text-light float-right">
                                Today All Expanses
                                </router-link>
                            </div>
                        </div>
                        
                        <form @submit.prevent="addExpanse" class="mt-4">
                            <div class="form-group">
                                <label class="m-0" for="expanse_details">Expanse details </label>
                                <textarea
                                    cols="15"
                                    rows="3"
                                    v-model="form.details" 
                                    class="form-control" 
                                    id="expanse_amount"
                                    placeholder="Expanse amount"
                                    name="details"
                                    :class="{ 'is-invalid': form.errors.has('details') }"> 
                                </textarea>
                               <has-error :form="form" field="details"></has-error>
                            </div>
                            <div class="form-group">
                                <label class="m-0" for="expanse_amount">Expanse Amount </label>
                                <input 
                                    type="text" 
                                    v-model="form.amount" 
                                    class="form-control" 
                                    id="expanse_amount"
                                  
                                    placeholder="Expanse amount"
                                    name="amount"
                                    :class="{ 'is-invalid': form.errors.has('amount') }"
                                />
                               <has-error :form="form" field="amount"></has-error>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
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
    name:'add-expanse',
    data() {
        return {
           form:new Form({
               details :'',
               amount: ''
           }) 
        }
    },
    methods: {
        addExpanse(){
            this.form.post('api/expanse/add')
            .then(res => {
                this.form.details = ''
                this.form.amount = ''
                this.$snotify.success(res.data.success, 'Success')
            })
        }
    },
}
</script>

<style scoped>
.form-group {
    margin-bottom: 7px;
}

</style>

        