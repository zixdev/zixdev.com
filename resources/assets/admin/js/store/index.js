import Vuex from 'vuex'
const store = new Vuex.Store({
    state: {
        authorized: false,
        auth: {},
        auth_permissions: [],
        $router: {},
        menu: [],
        config: {
            api_url: '/api/'
        }
    },

    mutations: {
        updateRouter(state, data) {
            state.$router = data;
        },
        updateMenu(state, menu) {
            state.menu = menu;
        }
    }
});

export default store;
