<template>
  <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Department</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Department</a></li>
                    <li class="breadcrumb-item active">Add Department Section</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Change User Password Form</h4>
                            </div>
                            <div class="col-md-6">
                                <router-link to="/user-profile" class="btn btn-sm btn-info text-light float-right">
                                    Back
                                </router-link>
                            </div>
                        </div>
                       
                        <form @submit.prevent="changePassword($route.params.id)" class="mt-4">
                            <div class="form-group">
                                <label>Old password</label>
                                <input 
                                    type="text" 
                                    v-model="form.old_password" 
                                    class="form-control" 
                                    placeholder="Enter old password"
                                    name="old_password"
                                    :class="{ 'is-invalid': form.errors.has('old_password') }"
                                />
                               <has-error :form="form" field="old_password"></has-error>
                            </div>
                            <div class="form-group">
                                <label>New password</label>
                                <input 
                                    type="text" 
                                    v-model="form.password" 
                                    class="form-control" 
                                    placeholder="Enter new password"
                                    name="password"
                                    :class="{ 'is-invalid': form.errors.has('password') }"
                                />
                               <has-error :form="form" field="password"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Confirm password</label>
                                <input 
                                    type="text" 
                                    v-model="form.password_confirmation" 
                                    class="form-control" 
                                    placeholder="Enter new password"
                                    name="password_confirmation"
                                    :class="{ 'is-invalid': form.errors.has('password_confirmation') }"
                                />
                               <has-error :form="form" field="password_confirmation"></has-error>
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
    name:'change-password',
    data() {
        return {
           form: new Form({
               old_password: '',
               password: '',
               password_confirmation: ''
           }),
         
        }
    },
    methods: {
        changePassword(userId){
            this.$Progress.start()
           this.form.put('api/user/change/password/'+userId)
           .then(res => {
               console.log(res.data);
               this.form.old_password = ''
               this.form.password = ''
               this.form.password_confirmation = ''
               this.$snotify.success(res.data.success)
               this.$Progress.finish()
           }).catch(err => {
               console.log(err.response)
               console.log(err.response.data.error);
               if (err.response.data.error) {
                    this.$snotify.error(err.response.data.error)
               }
               this.$Progress.fail()
           })
            
        }
    },
}
</script>

<style>

</style>