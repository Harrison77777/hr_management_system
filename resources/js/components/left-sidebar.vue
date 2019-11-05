<template>
    <div>
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap"></li>
                        <li>
                            <router-link to="/">
                                <i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span>
                            </router-link>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-widgets"></i><span
                                    class="hide-menu">Departments</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <router-link to="/all-departments">All Departments</router-link>
                                </li>
                                <li>
                                    <router-link to="/add-department">Add Department</router-link>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span
                                    class="hide-menu">Employees</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <router-link to="/add-employee">Add Employee</router-link>
                                </li>
                                <li>
                                    <router-link to="/all-employee">All Employees</router-link>
                                </li>
                                <li>
                                    <router-link to="/promotion-employee">Promotion</router-link>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-cash-usd"></i><span
                                    class="hide-menu">Expanse</span> </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <router-link to="/add-expanse">Add Expanse</router-link>
                                </li>
                                <li>
                                    <router-link to="/today-expanses">Today all Expanse</router-link>
                                </li>
                                <li>
                                    <router-link to="/yesterday-expanses">Yesterday all Expanses</router-link>
                                </li>
                                <li>
                                    <router-link to="/current-month-all-expanses">Current month</router-link>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-cash-multiple"></i><span
                                    class="hide-menu">Salary</span> </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <router-link to="/pay-salary">Pay Salary</router-link>
                                </li>
                                <li>
                                    <router-link to="/previous/months/salary/sheet"> All months salary list</router-link>
                                </li>
                                <li>
                                    <router-link to="/pay-advance-salary">Pay advance salary</router-link>
                                </li>
                                <li>
                                    <router-link to="/current/month/salary/sheet">Current month salary sheet</router-link>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-login"></i><span
                                    class="hide-menu">Recruitment</span> </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <router-link to="/vacancy">Vacancy</router-link>
                                    <router-link to="/all-place">All Place & requirement</router-link>
                                </li>                                
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-yelp"></i><span
                                    class="hide-menu">Projece & task listing</span> </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <router-link to="/add-project">Add Project</router-link>
                                    <router-link to="/all-project">View project & task</router-link>
                                </li>                                
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-cash-multiple"></i><span
                                    class="hide-menu">Employee Reports</span> </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <router-link to="/add-report">Add report</router-link>
                                    <router-link to="/view-all-reports">View all report</router-link>
                                </li>                                
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
    </div>
</template>

<script>
    export default {
        name: 'left-sidebar',
        data() {
            return {
                photoUrl: 'http://localhost/hrManagementSystem/public/static'
            }
        },
    }
</script>

<style>

</style>