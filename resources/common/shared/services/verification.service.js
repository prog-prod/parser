import httpClient from '../httpModule';

const RESOURCE_NAME = 'user/verification';

export default {
    telegram() {
        return httpClient.post(`${RESOURCE_NAME}/telegram`);
    },
    email() {
        return httpClient.post(`${RESOURCE_NAME}/email`);
    },
    trackTelegram(code) {
        return httpClient.get(`${RESOURCE_NAME}/verified/telegram?code=${code}`);
    }
};
