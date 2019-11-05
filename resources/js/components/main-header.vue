<template>
    <div>
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header h-100">
                    <router-link class="navbar-brand" to="/">
                        <!-- Logo icon -->
                        <b>
                             <strong style="color:#0188C3;">HR Management System </strong> 
                        </b>
                        
                        
                    </router-link>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a
                                class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a
                                class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> 
                        </li>

                        

                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    :src="user.photo" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img :src="user.photo" alt="user"></div>
                                            <div class="u-text">
                                                <h4>{{ user.name }}</h4>
                                                <p class="text-muted"><a
                                                        href="https://www.wrappixel.com/cdn-cgi/l/email-protection"
                                                        class="__cf_email__"
                                                        data-cfemail="8afcebf8ffe4caede7ebe3e6a4e9e5e7">[email&#160;protected] </a>
                                                <p class="text-muted">
                                                    Role: Super Admin
                                                </p>
                                                <router-link to="/user-profile"
                                                    class="btn btn-rounded btn-danger btn-sm">View
                                                    Profile</router-link>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><router-link to="/add-user"><i class="ti-wallet"></i> Create user</router-link></li>
                                 
                                    <li role="separator" class="divider"></li>
                                    
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a  
                                            onclick="
                                            event.preventDefault();
                                            document.getElementById('logoutFomr').submit();
                                            "
                                            href="#">
                                            <i class="fa fa-power-off"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

    </div>
</template>

<script>
    export default {
        name:'main-header',
        data() {

            return {
                
                user: ''
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