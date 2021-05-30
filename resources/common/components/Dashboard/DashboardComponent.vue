<template>
    <main-component>
        <h4 slot="breadcrumb-name" class="mb-0">Dashboard</h4>
        <template #filters>
            <FilterPrice @max-price="maxPrice" @min-price="minPrice"/>
            <FilterMarket/>
        </template>
        <div slot="content" class="dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th class="table-head">#</th>
                                <th v-for="column in columns" class="table-head cursor-pointer" :key="column" @click="sortByColumn(column)">
                                    {{ column | columnHead }}
                                    <span v-if="column === sortedColumn">
                                        <i v-if="order === 'asc' " class="fas fa-arrow-up"></i>
                                        <i v-else class="fas fa-arrow-down"></i>
                                    </span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="" v-if="stockFiltered.items.length === 0">
                                <td class="lead text-center" :colspan="columns.length + 1">No data found.</td>
                            </tr>
                            <tr v-for="(data, key1) in items" :key="data.id" class="m-datatable__row" v-else>
                                <td>{{ serialNumber(key1) }}</td>
                                <td v-for="(column, columnKey) in columns">
                                    <div v-for="(value, key) in data">
                                        <div v-if="column === key">
                                            <router-link v-if="key === 'symbol'" :to="{name: 'dashboard.stocks.show', params: {id: data.id}}">
                                                <span>{{ value }}</span>
                                            </router-link>
                                            <span v-else>{{ value }}</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <nav v-if="stockFiltered.pagination && stockFiltered.items.length > 0" class="mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item" :class="{'disabled' : currentPage === 1}">
                                <a class="page-link" href="#" @click.prevent="changePage(currentPage - 1)">Previous</a>
                            </li>
                            <li v-for="page in pagesNumber" class="page-item"
                                :class="{'active': page === stockFiltered.pagination.current_page}">
                                <a href="javascript:void(0)" @click.prevent="changePage(page)" class="page-link">{{ page }}</a>
                            </li>
                            <li class="page-item" :class="{'disabled': currentPage === stockFiltered.pagination.last_page }">
                                <a class="page-link" href="#" @click.prevent="changePage(currentPage + 1)">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main-component>
</template>

<script>
import FilterPrice from "./Stock/components/FilterPrice";
import FilterMarket from "./Stock/components/FilterMarket";
import {mapActions, mapGetters} from "vuex";

export default {
    components: {FilterPrice, FilterMarket},
    data() {
        return {
            filters:{
                price_min: null,
                price_max: null,
                market: null
            },
            stockFiltered: {
                items: [],
                pagination: {}
            },
            offset: 4,
            currentPage: 1,
            perPage: 20,
            sortedColumn: 'id',
            order: 'asc',
            columns: [
                'id',
                'symbol',
                'price',
                'securityName',
                'market',
                'securityType',
                'country',
                'pct1Day',
                'shortInterest',
                'shortInterestPercent',
                'volume',
                'isBank'
            ]
        }
    },
    async created() {
       await this.fetchData();
    },
    computed: {
        ...mapGetters(['STOCKS']),
        items(){
            return this.stockFiltered.items;
        },
        /**
         * Get the pages number array for displaying in the pagination.
         * */
        pagesNumber() {
            if (!this.stockFiltered.pagination.next_page) {
                return []
            }
            let from = this.stockFiltered.pagination.current_page - this.offset
            if (from < 1) {
                from = 1
            }
            let to = from + (this.offset * 2)
            if (to >= this.stockFiltered.pagination.last_page) {
                to = this.stockFiltered.pagination.last_page
            }
            let pagesArray = []
            for (let page = from; page <= to; page++) {
                pagesArray.push(page)
            }
            return pagesArray
        },
    },
    methods: {
        ...mapActions(['FETCH_STOCK_DATA']),
        maxPrice(price){
            this.filters.price_max = price
            this.fetchData();
            // this.stockFiltered.items = this.STOCKS.items.map(d => ({...d})).filter(d => d.price <= price);
        },
        minPrice(price){
            this.filters.price_min = price
            this.fetchData();
            // this.stockFiltered.items = this.STOCKS.items.filter(d => d.price >= price);
        },
        getFilters(){
            let filters = {};
            for(let filter in this.filters){
                if(this.filters[filter]){
                    filters = {...filters, price_min: this.filters[filter]}
                }
            }

            return filters;
        },
        async fetchData(){

            const filters = this.getFilters();

            await this.FETCH_STOCK_DATA({
                page: this.currentPage,
                column: this.sortedColumn,
                order: this.order,
                per_page: this.perPage,
                ...filters
            });

            this.stockFiltered.items = [...this.STOCKS.items];
            this.stockFiltered.pagination = {...this.STOCKS.pagination};
        },
        /**
         * Get the serial number.
         * @param key
         * */
        serialNumber(key) {
            return (this.currentPage - 1) * this.perPage + 1 + key
        },
        /**
         * Change the page.
         * @param pageNumber
         */
        changePage(pageNumber) {
            this.currentPage = pageNumber
            this.fetchData()
        },
        /**
         * Sort the data by column.
         * */
        sortByColumn(column) {
            if (column === this.sortedColumn) {
                this.order = (this.order === 'asc') ? 'desc' : 'asc'
            } else {
                this.sortedColumn = column
                this.order = 'asc'
            }
            this.fetchData()
        }
    },
    filters: {
        columnHead(value) {
            return value.split('_').join(' ').toUpperCase()
        }
    },
}
</script>

<style>
    .cursor-pointer{
        cursor: pointer;
    }
</style>
