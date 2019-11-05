import Dashboard from '../components/dashboard/dashboard.vue'
import addDepartment from '../components/department/add-department.vue'
import allDepartments from '../components/department/all-departments.vue'
import detailsDepartment from '../components/department/details-department.vue'
import employeeSalarySheet from '../components/employee/salary-sheet.vue'
import addEmployee from '../components/employee/add-employee.vue'
import allEmployee from '../components/employee/all-employees.vue'
import detailsEmployee from '../components/employee/details-employee.vue'
import editEmployeeInfo from '../components/employee/edit-employeeInfo.vue'
import promotionEmployeeInfo from '../components/employee/promotion-employee.vue'
import addExpanse from '../components/expanse/add-expanse.vue'
import todayExpanse from '../components/expanse/today-expanse.vue'
import yesterdayExpanse from '../components/expanse/yesterday-expanses.vue'
import currentMonthExpanses from '../components/expanse/current-month.vue'
import paySalary from '../components/salary/pay-salary.vue'
import departmentWiseSalary from '../components/salary/department-wise-salary.vue'
import currentMonthSalarySheet from '../components/salary/current-month-salary-sheet.vue'
import previousMonthSalarySheet from '../components/salary/previous-months-salary-sheet.vue'
import monthWiseSalarySheet from '../components/salary/month-wise-salary-sheet.vue'
import vacancy from '../components/recruitment/vacancy.vue'
import addVacancy from '../components/recruitment/add-vacancy.vue'
import editVacancy from '../components/recruitment/edit-vacancy.vue'
import detailsVacancy from '../components/recruitment/vacancy-details.vue'
import allPlaces from '../components/recruitment/place-requirement.vue'
import addPlace from '../components/recruitment/add-place.vue'
import editPlace from '../components/recruitment/edit-place.vue'
import detailsPlace from '../components/recruitment/place-details.vue'
import addProject from '../components/project_and_tasks/add-project.vue'
import allProject from '../components/project_and_tasks/all-project.vue'
import allTasksAndChangeStatus from '../components/project_and_tasks/all-tasks-and-change-status.vue'
import editProject from '../components/project_and_tasks/edit-project.vue'
import userProfile from '../components/user/user-profile.vue'
import editProfilePic from '../components/user/edit-profile-pic.vue'
import changePassword from '../components/user/change-password.vue'
import addUser from '../components/user/add-user.vue'
import editInfo from '../components/user/edit-info.vue'
import addReport from '../components/report/add-report.vue'
import viewAllReports from '../components/report/view-all-report.vue'
import detailsReport from '../components/report/details-report.vue'


export const routes = [
    {
        path:'/',
        component: Dashboard
    },
    {
        path:'/add-department',
        component: addDepartment
    },
    {
        path:'/all-departments',
        component: allDepartments
    },
    {
        path:'/details-department/:id',
        component: detailsDepartment
    },
    {
        path:'/add-employee',
        component: addEmployee
    },
    {
        path:'/all-employee',
        component: allEmployee
    },
    {
        path:'/details-employee/:id',
        component: detailsEmployee
    },
    {
        path:'/employee-salary-sheet/:id',
        component:employeeSalarySheet
    },
    {
        path:'/edit-employeeInfo/:id',
        component: editEmployeeInfo
    },
    {
        path:'/promotion-employee',
        component: promotionEmployeeInfo
    },
    {
        path:'/add-expanse',
        component: addExpanse
    },
    {
        path:'/today-expanses',
        component: todayExpanse
    },
    {
        path:'/yesterday-expanses',
        component: yesterdayExpanse
    },
    {
        path:'/current-month-all-expanses',
        component: currentMonthExpanses
    },
    {
        path:'/pay-salary',
        component: paySalary
    },
    {
        path:'/department/wise/salary/:id',
        component: departmentWiseSalary
    },
    {
        path:'/current/month/salary/sheet',
        component: currentMonthSalarySheet
    },
    {
        path:'/previous/months/salary/sheet',
        component: previousMonthSalarySheet
    },
    {
        path:'/month/wise/salary/sheet/:month',
        component: monthWiseSalarySheet
    },
    {
        path:'/vacancy',
        component: vacancy
    },
    {
        path:'/add-vacancy',
        component: addVacancy
    },
    {
        path:'/edit-vacancy/:id',
        component: editVacancy
    },
    {
        path:'/vacancy-details/:id',
        component: detailsVacancy
    },
    {
        path:'/all-place',
        component: allPlaces
    },
    {
        path:'/add-place',
        component:addPlace
    },
    {
        path:'/edit-place/:id',
        component:editPlace
    },
    {
        path:'/place-details/:id',
        component:detailsPlace
    },
    {
        path:'/add-project',
        component:addProject
    },
    {
        path:'/all-project',
        component:allProject
    },
    {
        path:'/edit-project/:id',
        component:editProject
    },
    {
        path:'/all-tasks-and-change-status/:id',
        component:allTasksAndChangeStatus
    },
    {
        path:'/user-profile',
        component:userProfile
    },
    {
        path:'/edit-profile-pic/:id',
        component:editProfilePic
    },
    {
        path:'/change-password/:id',
        component:changePassword
    },
    {
        path:'/add-user',
        component:addUser
    },
    {
        path:'/edit-info/:id',
        component:editInfo
    },
    
    {
        path:'/add-report',
        component:addReport
    },
    {
        path:'/view-all-reports',
        component:viewAllReports
    },
    {
        path:'/details-report/:id',
        component:detailsReport
    },
    
    
]

