import Dashboard from './Dashboard.vue';
const Zexus = {
    routes: [
        {
            name: 'dashboard',
            path: '/',
            meta: {
                menu: true,
                icon: 'fa-th-large',
                auth: true,
                permission: 'view_admin'
            },
            component: Dashboard
        }
    ]
};
window['Zexus'] = Zexus;
export default Zexus;