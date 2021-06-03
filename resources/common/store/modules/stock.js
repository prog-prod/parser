import StockService from "../../shared/services/stock.service";

export default {
    state: {
        stocks: {
            items: [],
            pagination: {}
        },
        stockIdHistory: null,
        stockUpdatedColumns: null
    },
    getters: {
        STOCKS: (state) => state.stocks,
        stockIdHistory: (state) => state.stockIdHistory,
        STOCK_UPDATED_COLUMNS: (state) => state.stockUpdatedColumns,
    },
    actions:{
        FETCH_STOCK_DATA({commit}, filterData){
            return StockService.list(filterData).then((response) => {
                commit('SET_STOCKS', response)
            });
        },
        GET_STOCK_UPDATED_COLUMNS({commit}, { stock_id }){
            return StockService.getUpdatedColumns(stock_id).then((response) => {
                commit('SET_STOCK_UPDATED_COLUMNS', response.columns)
            });
        }
    },
    mutations: {
        SET_STOCKS: (state, val) => {
            state.stocks.items = val.stocks
            state.stocks.pagination = val.pagination
        },
        SET_STOCK_ID_HISTORY:(state,val) => {
            state.stockIdHistory = val;
        },
        SET_STOCK_UPDATED_COLUMNS: (state, val) =>  state.stockUpdatedColumns = val
    },
}
