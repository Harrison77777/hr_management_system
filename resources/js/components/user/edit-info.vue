<template>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">User profile</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User profile</a></li>
                    <li class="breadcrumb-item active">Edit name</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Change User Name Form</h4>
                            </div>
                            <div class="col-md-6">
                                <router-link to="/user-profile" class="btn btn-sm btn-info text-light float-right">
                                    Back
                                </router-link>
                            </div>
                        </div>
                       
                        <form @submit.prevent="changeName($route.params.id)" class="mt-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input 
                                    type="text" 
                                    v-model="form.name" 
                                    class="form-control" 
                                    placeholder="Edit name"
                                    name="name"
                                    :class="{ 'is-invalid': form.errors.has('name') }"
                                />
                               <has-error :form="form" field="name"></has-error>
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
    name: 'edit-info',
    data() {
        return {
            form: new Form({
                name : ''
            })
        }
    },
     mounted() {
            this.getUserInfo()
        },
        methods: {
            getUserInfo(){
                axios.get('api/user/info')
                .then(res => {
                  
                    this.form.name = res.data.data.name

                })
            },
            changeName(userId){
                this.form.put('api/user/update/name/'+this.$route.params.id)
                .then(res => {
                    this.$snotify.success(res.data.success, 'Success')
                })
            }
        },
}
</script>

<style>

</style>