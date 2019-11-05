<template>
   <div>
      <main-header></main-header>
      <left-sidebar></left-sidebar>
      <div class="page-wrapper">
         <router-view></router-view>
      </div>
   </div>
</template>

<script>
   export default {
      name: 'app-layout'
   }
</script>

<style>

</style>