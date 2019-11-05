require('./bootstrap');
import Vue from 'vue'
import Antd from 'ant-design-vue';
import 'ant-design-vue/dist/antd.css';
Vue.use(Antd);
import { Form, HasError, AlertError } from 'vform'
window.Form = Form

import { options } from './progressbar/progressBarOption.js'
Vue.use(VueProgressBar, options)

import Snotify, { SnotifyPosition } from 'vue-snotify'

const sNotifyOptions = {
    toast: {
      position: SnotifyPosition.rightTop
    }
  }
  
  Vue.use(Snotify, sNotifyOptions)

import VueRouter from 'vue-router'
Vue.use(VueRouter)
import { routes } from './routes/routes.js'
const router = new VueRouter({
    routes,
  
});

import VueProgressBar from 'vue-progressbar'

import Vuex from 'vuex'
import { storage } from './storage/storage'
Vue.use(Vuex)
const store = new Vuex.Store(storage)

Vue.component('main-header', require('./components/main-header.vue').default);
Vue.component('app-layout', require('./components/app-layout.vue').default);
Vue.component('left-sidebar', require('./components/left-sidebar.vue').default);
Vue.component('dashboard', require('./components/dashboard/dashboard.vue').default);
Vue.component('pagination', require('./components/partial/pagination.vue').default);
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


const app = new Vue({
    store,
    router,
    el: '#app',
});
