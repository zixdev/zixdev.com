<template lang="jade">
  .row.border-bottom
    nav.navbar.navbar-static-top.white-bg(role='navigation')
      .navbar-header
        button.btn.btn-primary(@click="toggleSidebar")
          i.fa.fa-bars
        form.navbar-form-custom(role='search', method='post', action='#')
          .form-group
            input#top-search.form-control(type='text', :placeholder="$t('search.main')", name='top-search')
      ul.nav.navbar-top-links.navbar-right
        dropdown(:text="$t('lang')")
          li
            a(@click="changeLang('en')") English
          li
            a(@click="changeLang('fr')") French
          li
            a(@click="changeLang('ar')") Arabic

        li
          router-link(:to="{name: 'auth.logout'}")
            i.fa.fa-sign-out
            |  {{$t('auth.logout')}}

</template>

<script type="text/babel">
    import Vue from 'vue';
    import Component from "vue-class-component";

    @Component
    export default class AppHeader {
        data() {
          return {
            sideBarActive: true
          }
        }
        changeLang(lang) {
            Vue.config.lang = lang;
        }

        toggleSidebar() {
            //body.mini-navbar
            this.sideBarActive = ! this.sideBarActive;
            this.sideBarActive ? document.body.className = ''
                               : document.body.className = 'mini-navbar';
        }
    }

</script>

<style lang="scss" scooped>
  nav.navbar {
    margin-bottom: 0;
    button.btn-primary {
      padding: 4px 12px;
      margin: 14px 5px 5px 20px;
      font-size: 14px;
      float: left;
    }
  }
</style>
