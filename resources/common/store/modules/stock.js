import StockService from "../../shared/services/stock.service";

export default {
    state: {
        stocks: {
            items: [],
            pagination: {}
        },
        stockIdHistory: null,
        stockUpdatedColumns: null,
        stockHistoryDate: null,
        stock: {},
        initial_stock: {}
    },
    getters: {
        STOCKS: (state) => state.stocks,
        stockIdHistory: (state) => state.stockIdHistory,
        STOCK_UPDATED_COLUMNS: (state) => state.stockUpdatedColumns,
        STOCK_HISTORY_DATE: (state) => state.stockHistoryDate,
        STOCK: (state) => state.stock,
        INITIAL_STOCK: (state) => state.initial_stock
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
        },
        FETCH_STOCK_HISTORY({commit}, data){
            return StockService.getHistory(data).then((response) => {
                commit('SET_STOCK', response.stock)
            });
        },
        LOAD_STOCK({commit}, stock_id) {
            return StockService.show(stock_id).then((response) => {
                commit('SET_STOCK',response.stock);
                commit('SET_INITIAL_STOCK',response.stock);
            })
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
        SET_STOCK_HISTORY_DATE:(state,val) => {
            state.stockHistoryDate = val;
        },
        SET_STOCK_UPDATED_COLUMNS: (state, val) =>  state.stockUpdatedColumns = val,
        SET_STOCK: (state, val) =>  state.stock = val,
        SET_INITIAL_STOCK: (state, val) =>  state.initial_stock = val
    },
}
