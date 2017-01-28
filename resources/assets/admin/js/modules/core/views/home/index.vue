<template lang="jade">
    .row
        .col-md-12
            tabs
              tab(header='Config', :active='true')
                div Some Content ?
              tab(header='Setting') Some Setting  ?



</template>
<script type="text/babel">
    import Component from 'vue-class-component'
    import Vue from "vue";


    @Component
    export default class Home {
        data() {
          return {
            showAlert: true
          }
        }
        created() {


        }

        get home() {
            return 'hello world';
        }

        change() {
            Vue.config.lang = 'ar';
        }
    }

</script>
