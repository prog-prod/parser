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
    },
    getHistoryDates(stock_id){
        return httpClient.get(`/stock/get-history-updates/${stock_id}`)
    },
    getHistory(params){
        return httpClient.post(`/stock/get-stock-history`, params)
    },
    getUpdatedColumns(stock_id){
        return httpClient.get(`/stock/get-updated-columns/${stock_id}`)
    },
    viewStockUpdates(stock_id){
        return httpClient.post(`stock/view-stock-updates/${stock_id}`)
    }
};
