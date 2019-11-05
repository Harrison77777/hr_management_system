<template>
   <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Add User</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Add User Form</h4>
                            </div>
                        </div>
                        
                        <form @submit.prevent="addUser" class="mt-4">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input 
                                    type="text" 
                                    v-model="form.name" 
                                    class="form-control" 
                                    id="username"
                                  
                                    placeholder="user name"
                                    name="name"
                                    :class="{ 'is-invalid': form.errors.has('name') }"
                                />
                               <has-error :form="form" field="name"></has-error>
                            </div>

                            <div class="form-group">
                                <label>E-mail address</label>
                                <input 
                                    type="text" 
                                    v-model="form.email" 
                                    class="form-control" 
                                    placeholder="email address"
                                    name="email"
                                    :class="{ 'is-invalid': form.errors.has('email') }"
                                />
                               <has-error :form="form" field="email"></has-error>
                            </div>

                            <div class="form-group">
                                <label>role</label>
                                <select 
                                name="role" id=""
                                class="form-control" 
                                v-model="form.role" 
                                :class="{ 'is-invalid': form.errors.has('role') }"
                                
                                >
                                <option value="">Select role</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Admin user</option>
                                <option value="3">Checker</option>
                                </select>
                               <has-error :form="form" field="role"></has-error>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input 
                                    type="password" 
                                    v-model="form.password" 
                                    class="form-control" 
                                    placeholder="Pasword"
                                    name="password"
                                    :class="{ 'is-invalid': form.errors.has('password') }"
                                />
                               <has-error :form="form" field="password"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Confirm password</label>
                                <input 
                                    type="password" 
                                    v-model="form.password_confirmation" 
                                    class="form-control" 
                                    placeholder="Confirm password"
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
    name:'add-user',
    data() {
        return {
           form: new Form({
               name: '',
               email: '',
               role: '',
               password: '',
               password_confirmation: '',
           }) 
        }
    },
    methods: {
        addUser(){
            this.$Progress.start()
            this.form.post('api/user/add')
            .then(res => {
                this.form.name = ''
                this.form.email = ''
                this.form.role = ''
                this.form.password = ''
                this.form.password_confirmation = ''
                this.$snotify.success(res.data.success, 'Success')
                this.$Progress.finish()
            }).catch(err => {
                console.log(err)
                this.$Progress.fail()
            })
        }
    },
}
</script>

<style>

</style>