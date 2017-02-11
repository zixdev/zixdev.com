<template>
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear text-capitalize">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">
                                        {{ user.username }}
                                    </strong>
                                </span>
                                <span class="text-muted text-xs block">
                                    {{ roles(user) }}
                                    <b class="caret"></b>
                                </span>
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="/logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        ZIX+
                    </div>
                </li>
                <li v-for="route of routes" v-if="can(route.permission)">
                    <a  v-if="route.children && route.children.length">
                        <i :class="'fa ' + route.icon"></i>
                        <span class="nav-label"> {{$t(route.name)}}</span>
                        <span class="fa arrow"></span>
                    </a>
                    <router-link :to="link(route)" v-else="v-else">
                        <i :class="'fa ' + route.icon"></i>
                        <span class="nav-label">{{$t(route.name)}}</span>
                    </router-link>
                    <ul class="nav nav-second-level" v-if="route.children && route.children.length">
                        <router-link v-for="child of route.children" v-if="can(child.permission)" tag="li" :to="child.path">
                            <router-link :to="child.path">{{$t(child.name)}}</router-link>
                        </router-link>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>
</template>

<script type="text/babel">
    import Vue from 'vue'
    import Component from 'vue-class-component'
    import Zexus from './../zexus';

    @Component
    export default class Sidebar extends Vue {
        show = true;
        get user() {
            return Auth.user;
        }
        roles(user) {
            return user.roles.map(role => {
                return role.name
            }).toString()
        }
        get routes() {
            let SideBarRoutes = Zexus.routes.filter(route => route.meta.menu).map(route => {
                return {
                    order: route.order,
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
            })

            return _.orderBy(SideBarRoutes, 'order');
        }

        link(route) {
            return route.children ? '' : {name: route.name, activeClass: 'active'};
        }

        can(permission) {
            return Auth.permissions.includes(permission) ? true : false;
        }
    }
</script>