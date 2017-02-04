<template>
    <main id="wrapper">
        <app-sidebar></app-sidebar>
        <div id="page-wrapper" class="gray-bg">
            <app-header></app-header>
            <div class="wrapper wrapper-content">
                <div class="row">
                    <router-view></router-view>
                </div>
            </div>

            <app-footer></app-footer>
        </div>
    </main>
</template>

<script type="text/babel">
    import Vue from 'vue'
    import Component from 'vue-class-component'
    import AppHeader from './components/header.vue';
    import AppSidebar from './components/sidebar.vue';
    import AppFooter from './components/footer.vue';
    import toastr from "toastr";

    @Component({
        components: {
            AppHeader, AppSidebar, AppFooter
        }
    })
    export default class App extends Vue  {
        mounted() {
            this.$events.$on('notify', (data) => {
                this.notify(data);
            });
        }

        notify(data) {
            toastr.options.closeButton = true;
            toastr.options.escapeHtml = true;
            toastr.options.progressBar = true;

            toastr.options.rtl = true;

            toastr[data.type](data.message, data.title);
        }
    }
</script>
