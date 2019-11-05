<template>
  <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">User Profile</h3>
                
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <div class="dropdown float-right  hidden-sm-down">
                    <router-link :to="{path:'/edit-profile-pic/'+user.id}" class="btn btn-secondary btn-sm"> 
                        Update user Profile Photo 
                    </router-link>
                </div>
                <router-link :to="{path:'/edit-info/'+user.id}" class="btn mr-2 float-right btn-sm text-white btn-info"><i class="mdi mdi-pencil-box-outline"></i>
                    Edit User Name
                </router-link>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">All Details of {{ user.name }}</h4>
                            </div>
                            <div class="col-md-6">
                                <router-link class="btn btn-sm btn-success float-right" :to="{path:'/change-password/'+user.id}">Change Password</router-link>
                            </div>
                        </div>
                        <div class="employee-datails-area">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="employee-photo-area">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="employee-photo text-left">
                                                    <img class="rounded mb-1" height="200" width="200" :src="user.photo" alt="">
                                                </div>
                                            </div>                                           
                                        </div>
                                    </div>
                                    <div class="employee-info-area">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="employee-info table-responsive">
                                                    <table class="table table-sm">
                                                        <tr>
                                                            <td> <strong>User Name:</strong> </td>
                                                            <td>{{ user.name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td> <strong>User E-mail</strong> </td>
                                                            <td>{{ user.email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Role : </td>
                                                            <td v-if="user.role == 1">Super Admin</td>
                                                            <td v-else-if="user.role == 2">Admin</td>
                                                            <td v-else>Checker</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
      data() {

            return {
                photoUrl: 'http://localhost/hrManagementSystem/public/static',
                user: []
            }
        },
        mounted() {
            this.getUserInfo()
        },
        methods: {
            getUserInfo(){
                axios.get('api/user/info')
                .then(res => {
                  
                    this.user = res.data.data

                })
            }
        },
}
</script>

<style>

</style>