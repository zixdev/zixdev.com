<template lang="jade">
  nav.navbar-default.navbar-static-side(role='navigation')
    .sidebar-collapse
      ul.nav.metismenu()
        li.nav-header
          .profile-element
            a(href='javascript:void(0);')
              span.clear
                span.block.m-t-xs
                  strong.font-bold
                    | Badi Ifaoui
                span.text-muted.text-xs.block
                  | CEO Founder {{ routes.length}}
          .logo-element
            | Zix+

        side-bar-links(v-for='route of routes', :route='route')


</template>

<script type="text/babel">
  import Component from "vue-class-component";
  import routes from "../../../../router/menu";
  import SideBarLinks from './SideBarLinks'

  @Component({
    components: {
      SideBarLinks
    }
  })
  export default class AppSidebar {
      get routes() {
          return this.$store.state.menu.filter(route => route.meta.menu).map(route => {
              return {
                  path: route.path,
                  name: route.name,
                  permission: route.meta.permission,
                  icon: route.meta.icon,
                  children: route.children ? route.children.filter(route => route.meta.menu).map(route => {
                      return {
                          path: route.path,
                          name: route.name,
                          permission: route.meta.permission,
                          icon: route.meta.icon
                      }
                  }) : null
              }
          });
      }

  }

</script>
