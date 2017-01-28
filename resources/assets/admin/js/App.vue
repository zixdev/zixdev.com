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

    @Component({
        components: {
            AppHeader, AppSidebar, AppFooter
        }
    })
    export default class App extends Vue  {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
