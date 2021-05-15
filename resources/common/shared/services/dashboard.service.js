import httpClient from '../httpModule';

const RESOURCE_NAME = 'dashboard';

export default {
    stocks(filterData) {
        return httpClient.get(`${RESOURCE_NAME}?${new URLSearchParams(filterData).toString()}`);
    },
};
