import AuthService from "../../shared/services/auth.service";
import UserService from "../../shared/services/user.service";

const AUTH_KEY = process.env.MIX_TOKEN_KEY;

export default {
    state: {
        status: '',
        user: {},
        access_token: localStorage.getItem(AUTH_KEY),
        timerOptions: {},
        showRightSidebar: false,
    },
    getters: {
        user: (state) => {
            return state.user;
        },
        isLoggedIn: state => !!state.access_token,
        authStatus: state => state.status,
        timerOptions: (state) => {
            return state.timerOptions;
        },
        showRightSidebar: state => state.showRightSidebar
    },
    actions:
        {
            loginSuccess({commit}, data)
            {
                commit('auth_success', {user: data.user, token: data.access_token});
                return true;
            },
            register({commit}, user){
                return new Promise((resolve, reject) => {
                    AuthService.register(user).then((response) => {
                        const token = response.access_token;
                        const user = response.user;
                        commit('auth_success', token, user);
                        resolve(response);
                    })
                        .catch((error) => {
                            localStorage.removeItem(AUTH_KEY);
                            reject(error);
                        });
                })
            },
            updateUser({commit}, userData) {
                return commit('up_user_data', {user: userData});
            },
            updateUserData({commit}) {
                return new Promise((resolve, reject) => {
                    UserService.getMyInfo().then((response) => {
                        if (response.result === true) {
                            commit('auth_success', {user: response.user});
                        }
                        resolve(response);
                    }).catch((error) => {
                        reject(error);
                    });
                })
            },
            logout({commit}){
                commit('logout');
            },
            setTimerOptions({commit}, data) {
                commit('timer_options', {data: data});
            },
            async loadTimerOptions({commit}, data) {
                await commit('timer_options', {data: data});
            },
            updateStockFilterSettings({commit}, data) {
                commit('update_user_stock_filter', data);
            }
        },
    mutations: {
        change_show_right_sidebar(state,val){
            state.showRightSidebar = val
        },
        auth_success(state, {user, token}){
            if (token) {
                state.access_token = token;
                localStorage.setItem(AUTH_KEY, token);
                axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
            }
            state.user = user;
            state.status = 'success';
        },
        up_user_data(state, {user}) {
            state.user = user;
        },
        logout(state){
            state.status = '';
            state.access_token = '';
            AuthService.logout();
        },
        timer_options(state, {data}) {
            state.timerOptions = data;
        },
        update_user_stock_filter(state, {data}) {
            state.user.stock_filter = data;
        }
    },
}
