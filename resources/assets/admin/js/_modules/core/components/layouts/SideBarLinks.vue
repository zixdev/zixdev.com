<template>

    <li :class="{'active': show}" v-if="can(route.permission)">
        <a @click="toggleShow" v-if="route.children && route.children.length">
            <i :class="'fa ' + route.icon"></i>
            <span class="nav-label"> {{$t(route.name)}}</span>
            <span class="fa arrow"></span>
        </a>
        <router-link :to="link(route)" v-else="v-else">
            <i :class="'fa ' + route.icon"></i>
            <span class="nav-label">{{$t(route.name)}}</span>
        </router-link>
        <ul class="nav nav-second-level" v-if="route.children && route.children.length" :class="classes">
            <router-link v-for="child of route.children" v-if="can(child.permission)" tag="li" :to="child.path">
                <router-link :to="child.path">{{$t(child.name)}}</router-link>
            </router-link>
        </ul>
    </li>

</template>
<script type="text/babel">
    import Component from "vue-class-component";
//    import Auth from '../../../A'

    @Component({
        props: {
            route: {
                type: Object,
            }
        }
    })
    export default class SideBarLinks {
        data() {
            return {
                show: false,
                hide: true,
                collapsing: false
            }
        }

        can(permission) {
        	return this.$store.state.auth_permissions.includes(permission) ? true : false;
        }

        get classes() {
            return {
                'collapse': this.hide,
                'collapse in': this.show,
                'collapsing': this.collapsing,
            }
        }

        link(route) {
            return route.children ? '' : {name: route.name, activeClass: 'active'};
        }

        toggleShow() {
            this.hide = !this.hide;

            this.collapsing = true;
            setTimeout(() => {
                this.collapsing = false;
                this.show = !this.show;
            }, 100)
        }
    }
</script>
