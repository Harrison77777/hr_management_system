<template>
  <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Reports</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Reports</a></li>
                    <li class="breadcrumb-item active">Add Report Section</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Add Report Form</h4>
                            </div>
                        </div>
                        
                        <form @submit.prevent="addReport" class="mt-4">

                            <div class="form-group">
                                <label for="add_department">Employee name</label>
                                <input 
                                    type="text" 
                                    v-model="form.employee_name" 
                                    class="form-control" 
                                    id="vacancName"
                                  
                                    placeholder="Employee_name"
                                    name="employee_name"
                                    :class="{ 'is-invalid': form.errors.has('employee_name') }"
                                />
                               <has-error :form="form" field="employee_name"></has-error>
                            </div>

                            <div class="form-group">
                                <label>Employee ID</label>
                                <input 
                                    type="text" 
                                    v-model="form.employee_id" 
                                    class="form-control" 
                                    placeholder="Employee ID"
                                    name="employee_id"
                                    :class="{ 'is-invalid': form.errors.has('employee_id') }"
                                />
                               <has-error :form="form" field="employee_id"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Write Report</label>
                                <textarea 
                                    id="tinymce"
                                    type="text" 
                                    v-model="form.report" 
                                    class="form-control" 
                                    placeholder="Report will be go here"
                                    name="report"
                                    :class="{ 'is-invalid': form.errors.has('report') }"
                                    cols="15"
                                    rows="5"
                                    >
                                </textarea>
                               <has-error :form="form" field="report"></has-error>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
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
    name:'add-report',
    data() {
        return {
            form: new Form({
                employee_name: '',
                employee_id : '',
                report : ''
            })
        }
    },
    methods: {
        addReport(){
            this.form.post('api/report/add')
            .then(res => {
                this.$snotify.success(res.data.success)
            })
        }
    },
}
</script>

<style>

</style>