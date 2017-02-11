// lazy loading Components
// https://github.com/vuejs/vue-router/blob/dev/examples/lazy-loading/app.js#L8
const lazyLoading = (name, index = false) => resolve => require([`../views/${name}${index ? '/index' : ''}.vue`], resolve);

export default [
    {
        order: 3,
        path: '/blogs',
        name: 'blogs.index',
        meta: {
            icon: 'fa-pencil-square-o',
            menu: true,
            auth: false,
            permission: 'view_pages'
        },
        component: lazyLoading('+blogs', true),
        children: [
            /*
             * blogs Routes
             */
            {
                path: '/blogs/',
                name: 'blogs.all',
                meta: {
                    menu: true,
                    auth: true,
                    permission: 'view_pages'
                },
                component: lazyLoading('+blogs', true)
            },
            {
                path: '/blogs/add',
                name: 'blogs.add',
                meta: {
                    auth: true,
                    permission: 'create_pages'
                },
                component: lazyLoading('+blogs/create')
            },
            {
                path: '/blogs/:id/edit',
                name: 'blogs.edit',
                meta: {
                    auth: true,
                    permission: 'update_pages'
                },
                component: lazyLoading('+blogs/create')
            },
            /**
             * Blog Categories
             */
            {
                path: '/blogs/categories',
                name: 'blogs.categories.index',
                meta: {
                    menu: true,
                    auth: true,
                    permission: 'create_pages'
                },
                component: lazyLoading('+categories', true)
            },
            {
                path: '/blogs/categories/add',
                name: 'blogs.categories.add',
                meta: {
                    auth: true,
                    permission: 'create_pages'
                },
                component: lazyLoading('+categories/create')
            },
            {
                path: '/blogs/categories/:id/edit',
                name: 'blogs.categories.edit',
                meta: {
                    auth: true,
                    permission: 'create_pages'
                },
                component: lazyLoading('+categories/create')
            },


        ]
    }
]