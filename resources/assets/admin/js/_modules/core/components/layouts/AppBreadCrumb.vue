<template lang="jade">
.row.wrapper.border-bottom.white-bg.page-heading
  .col-lg-10
    h2
      | {{$t(router.name)}}
    ol.breadcrumb.text-capitalize
      li(v-if="router.name != 'dashboard'")
        router-link(:to="{name: 'dashboard'}") {{$t('dashboard')}}
      li(v-for='crumb in breadcrumbs')
        router-link(:to='{name: crumb, params: router.params}') {{$t(crumb)}}

</template>

<script>
  import Component from "vue-class-component";

  @Component
  export default class AppBreadCrumb {
      created() {
          this.$watch('$route', () => {
              this.$Progress.start();
          })
      }

      get router() {
          return this.$store.state.$router;
      }

      get breadcrumbs() {
          return this.router.matched.map(route => {
              return route.name
          });
      }

  }

</script>
