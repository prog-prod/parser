import Vue from 'vue'
import Vuex from 'vuex'

// Modules
import app from './modules/app'
import stock from './modules/stock'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        app,
        stock,
    },
    strict: process.env.DEV,
})
