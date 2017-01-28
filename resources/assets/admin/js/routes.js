import VueRouter from 'vue-router';
import Zexus from './zexus';


function createRoutesFromMenu(routes) {
    let newRoutes = [];
    routes.filter(route => {
        return route.children;
    }).map(route => {
        return route.children;
    }).map(_routes => {
        _routes.map(item => {
            newRoutes.push(item);
        })
    });

    routes.filter(route => {
        return !route.children;
    }).map(route => {
        newRoutes.push(route);
    });

    return newRoutes;
}

const Routes = [
    ...createRoutesFromMenu(Zexus.routes)
];
const router = new VueRouter({
    scrollBehavior: () => ({y: 0}),
    routes: Routes
})
export default router;