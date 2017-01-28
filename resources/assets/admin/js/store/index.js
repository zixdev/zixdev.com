import Vuex from 'vuex'
import Config from './config';
const store = new Vuex.Store({
    state: {
        authorized: false,
        auth: {},
        auth_permissions: [],
        config: Config,
        $router: {},
        menu: []
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
