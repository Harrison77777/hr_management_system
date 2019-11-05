<template>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Update Profile Photo</h3>

            </div>
            <div class="col-md-6 col-4 align-self-center">
                <router-link to="/user-profile" class="btn mr-2 float-right btn-sm text-white btn-info"><i
                        class="mdi mdi-pencil-box-outline"></i>
                    Back
                </router-link>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Current photo</h4>
                            </div>

                        </div>
                        <div class="employee-datails-area">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="employee-photo-area">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="employee-photo text-left">
                                                    <img class="rounded mb-1" height="200" width="200"
                                                        :src="user.photo"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="edit-photo-section">
                                        <div class="row">
                                            <form @submit.prevent="updateProfiel(user.id)">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <label for="photo">Choose Photo</label>
                                                        <input 
                                                            @change="getuserProfilePhoto" type="file" class="form-control"
                                                            id="photo">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <img :src="photoPreview" class="empPhoto" alt="">
                                                </div>
                                                <button class="btn btn-primary mt-2" type="submit">Submit</button>
                                            </form>
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
        name: 'edit-profile-pic',
        data() {
            return {
                user: '',
                photoPreview:'',
                photo:''
            }
        },
        mounted() {
            this.getUserInfo()
        },
        methods: {
            getuserProfilePhoto() {
                let file = event.target.files[0]
                this.photo = file
                let reader = new FileReader();
                reader.onload = e => {
                    this.photoPreview = e.target.result
                    //console.log(e.target.result)
                }
                reader.readAsDataURL(file);
            },
            getUserInfo() {
                axios.get('api/user/info')
                    .then(res => {
                        this.user = res.data.data
                    })
            },
            updateProfiel(userId){
                let updateUserPhoto = new FormData()
                updateUserPhoto.append('photo', this.photo)
                this.$Progress.start()
                axios.post('api/user/update/profile/photo/'+this.$route.params.id,updateUserPhoto)
                .then(res => {
                this.$snotify.success(res.data.success)
                this.getUserInfo()
                this.$Progress.finish()             
                }).catch(err => {
                    this.$snotify.error(err.response.data.errors.photo[0])
                    this.$Progress.fail() 
                })
            }
        },
    }
</script>

<style>

</style>