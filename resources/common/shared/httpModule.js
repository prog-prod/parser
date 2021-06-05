import axios from 'axios';
import store from '../store/index';
import routes from '../routes';

// Api URL
let config = {
    baseURL: process.env.MIX_API
};

const httpClient = axios.create(config);

const authInterceptor = config => {
    // Adding Api Token to each request
    store.state.access_token = localStorage.getItem(process.env.MIX_TOKEN_KEY);
    if (store.state.access_token) {
        config.headers.Authorization = `Bearer ${store.state.access_token}`;
    }

    return config;
};

const loggerInterceptor = config => {
    return config;
};

httpClient.interceptors.request.use(authInterceptor);
httpClient.interceptors.request.use(loggerInterceptor);

httpClient.interceptors.response.use(
    response => {
        let data = response.data;
        // if we got result not true, then show error
        if (data.result !== true) {
            window.Vue.toasted.error(data.message);
            return Promise.reject(data);
        }
        // else return response data
        return response.data;
    },
    error => {
        let response = error.response;
        if (response.status === 401)
        {
            store.dispatch("logout");
            if (routes.currentRoute.path !== '/login') {
                routes.push({ name: "auth.login"});
            }
        }
        else if (response.status === 404) {
            routes.push({ name: 'dashboard.404' });
            return Promise.reject(error.response.data);
        }
        else if (response.status === 403) {
            routes.push({ name: 'dashboard.403' });
            return Promise.reject(error.response.data);
        }
        else if (response.status === 429) {
            window.Vue.toasted.error('You have made too many requests in the last minute. Please try again later.');
            return Promise.reject(error.response.data);
        }

        // show errors from back-end side
        $.each(response.data.errors, function (key, value) {
            window.Vue.toasted.error(value);
        });

        return Promise.reject(error.response.data);
    }
);

export default httpClient;
