import httpClient from '../httpModule';

const RESOURCE_NAME = 'auth';

export default {
    login(data) {
        return httpClient.post(`${RESOURCE_NAME}/login`, data);
    },
    register(data) {
        return httpClient.post(`${RESOURCE_NAME}/register`, data);
    },
    resetPassword(data) {
        return httpClient.post(`${RESOURCE_NAME}/reset-password`, data);
    },
    resetPasswordConfirm(data) {
        return httpClient.post(`${RESOURCE_NAME}/reset-password/confirmation`, data);
    },
    logout()
    {
        localStorage.removeItem(process.env.MIX_TOKEN_KEY);
        axios.defaults.headers.common['Authorization'] = '';
    }
};
