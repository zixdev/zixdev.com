const Foo = { template: '<div>foo</div>' }
const Bar = { template: '<div>bar</div>' }
import VueRouter from 'vue-router';
import CoreRoutes from './modules/core/routes';
// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// Vue.extend(), or just a component options object.
// We'll talk about nested routes later.
const Routes = [
    { path: '/', component: Foo },
    //{ path: '/bar', component: Bar },
    CoreRoutes
];
const router = new VueRouter({
    routes: Routes
})
export default router;