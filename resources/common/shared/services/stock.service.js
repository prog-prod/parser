import httpClient from '../httpModule';
import axios from "axios";

const RESOURCE_NAME = 'stocks';

export default {
    list(filterData) {
        return httpClient.get(`${RESOURCE_NAME}?${new URLSearchParams(filterData).toString()}`);
    },
    show(stock_id) {
        return httpClient.get(`${RESOURCE_NAME}/${stock_id}`);
    },
    getMarketList(){
        return httpClient.get(`/get-market-list`);
    }
};
