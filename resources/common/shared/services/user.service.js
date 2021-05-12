import httpClient from '../httpModule';

const RESOURCE_NAME = 'user';

export default {
    getMyInfo() {
        return httpClient.get(`${RESOURCE_NAME}/profile`);
    },
    updateProfile(data) {
        return httpClient.put(`${RESOURCE_NAME}/profile`, data);
    },
    updatePassword(data) {
        return httpClient.put(`${RESOURCE_NAME}/profile/password`, data);
    }
};
