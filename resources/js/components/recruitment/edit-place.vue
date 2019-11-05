<template>
  <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Recruitment</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">All place & requirements</a></li>
                    <li class="breadcrumb-item active">Edit Place & requirements Section</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Edit Place & requirements Form</h4>
                            </div>
                            <div class="col-md-6">
                                   <router-link to="/all-place" class="btn btn-sm float-right hidden-sm-down btn-info">
                                    Back
                                </router-link>
                            </div>
                        </div>
                        
                        <form @submit.prevent="editPlace" class="mt-4">

                            <div class="form-group">
                                <label for="add_department">Place name</label>
                                <input 
                                    type="text" 
                                    v-model="form.place_name" 
                                    class="form-control" 
                                    id="vacancName"
                                    placeholder="Place name"
                                    name="place_name"
                                    :class="{ 'is-invalid': form.errors.has('place_name') }"
                                />
                               <has-error :form="form" field="place_name"></has-error>
                            </div>


                            <div class="form-group">
                                <label>Education qualification</label>
                                <textarea 
                                    id="tinymce"
                                    type="text" 
                                    v-model="form.education_qualification" 
                                    class="form-control" 
                                    placeholder="Education qualification"
                                    name="education_qualification"
                                    :class="{ 'is-invalid': form.errors.has('education_qualification') }"
                                    cols="15"
                                    rows="5"
                                    >
                                </textarea>
                               <has-error :form="form" field="education_qualification"></has-error>
                            </div>

                            <div class="form-group">
                                <label>Skill requirement</label>
                                <textarea 
                                    id="tinymce"
                                    type="text" 
                                    v-model="form.skill_qualification" 
                                    class="form-control" 
                                    placeholder="Skill requeirement"
                                    name="skill_qualification"
                                    :class="{ 'is-invalid': form.errors.has('skill_qualification') }"
                                    cols="15"
                                    rows="5"
                                    >
                                </textarea>
                               <has-error :form="form" field="skill_qualification"></has-error>
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
    name:'add-vacancy',
    data() {
        return {
            form: new Form({
                place_name : '',
                education_qualification: '',
                skill_qualification: ''
            }),
        }
    },
    mounted() {
        
        this.getEditPlaceData()
        
    },
    methods: {
        editPlace(){
            this.$Progress.start()
            this.form.put('api/recruitment/update/place/info/'+this.$route.params.id)
            .then(res => {
                this.$Progress.finish()
                this.$snotify.success(res.data.success)
            }).catch(err => {
                console.log(err)
                this.$Progress.fail()
            })
        },
        getEditPlaceData(){
            this.$Progress.start()
            axios.get('api/recruitment/edit/place/info/'+this.$route.params.id)
            .then(res => {
                this.form.place_name = res.data.data.place_name
                this.form.education_qualification = res.data.data.education_qualification
                this.form.skill_qualification = res.data.data.skill_qualification
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