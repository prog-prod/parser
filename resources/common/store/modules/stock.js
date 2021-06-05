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
        initial_stock: {},
        filterData:{
            price_min: null,
            price_max: null,
            market: null,
            country: null,
            symbol: null
        },
    },
    getters: {
        STOCKS: (state) => state.stocks,
        stockIdHistory: (state) => state.stockIdHistory,
        STOCK_UPDATED_COLUMNS: (state) => state.stockUpdatedColumns,
        STOCK_HISTORY_DATE: (state) => state.stockHistoryDate,
        STOCK: (state) => state.stock,
        INITIAL_STOCK: (state) => state.initial_stock,
        FILTER_DATA: (state) => {
            let filters = {};
            for(let filter in { ...state.filterData }){
                if(state.filterData[filter]){
                    filters[filter] = state.filterData[filter]
                }
            }

            return filters;
        }
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
        },
        VIEW_STOCK_UPDATES({commit,dispatch,getters}, stock_id){
            return StockService.viewStockUpdates(stock_id).then((response) => {
                dispatch('FETCH_STOCK_DATA',getters.FILTER_DATA)
            });
        },
        RESET_HISTORY({commit}){
            commit('SET_STOCK_HISTORY_DATE',null);
            commit('SET_INITIAL_STOCK',{});
            commit('SET_STOCK',{});
            commit('SET_STOCK_UPDATED_COLUMNS',null);
            commit('SET_STOCK_ID_HISTORY',null);
            commit('change_show_right_sidebar', false)
        }
    },
    mutations: {
        SET_STOCKS: (state, val) => {
            state.stocks.items = val.stocks
            state.stocks.pagination = val.pagination
        },
        SET_FILTER_DATA(state, params){
            const prop = Object.keys(params)[0];
            if(state.filterData.hasOwnProperty(prop)){
                state.filterData[prop] = params[prop]
            }
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
