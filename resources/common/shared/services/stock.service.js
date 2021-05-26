import httpClient from '../httpModule';

const RESOURCE_NAME = 'stocks';

export default {
    list(filterData) {
        return httpClient.get(`${RESOURCE_NAME}?${new URLSearchParams(filterData).toString()}`);
    },
    show(stock_id) {
        return httpClient.get(`${RESOURCE_NAME}/${stock_id}`);
    }
};
