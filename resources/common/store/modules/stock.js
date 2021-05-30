import StockService from "../../shared/services/stock.service";

export default {
    state: {
        stocks: {
            items: [],
            pagination: {}
        }
    },
    getters: {
        STOCKS: (state) => state.stocks
    },
    actions:{
        FETCH_STOCK_DATA({commit}, filterData){
            return StockService.list(filterData).then((response) => {
                commit('SET_STOCKS', response)
            });
        }
    },
    mutations: {
        SET_STOCKS: (state, val) => {
            state.stocks.items = val.stocks
            state.stocks.pagination = val.pagination
        }
    },
}
