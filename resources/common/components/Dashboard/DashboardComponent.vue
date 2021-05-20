<template>
    <main-component>
        <h4 slot="breadcrumb-name" class="mb-0">Dashboard</h4>
        <div slot="content" class="dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th class="table-head">#</th>
                                <th v-for="column in columns" :key="column" @click="sortByColumn(column)" class="table-head">
                                    {{ column | columnHead }}
                                    <span v-if="column === sortedColumn">
                                    <i v-if="order === 'asc' " class="fas fa-arrow-up"></i>
                                    <i v-else class="fas fa-arrow-down"></i>
                                </span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="" v-if="socks.length === 0">
                                <td class="lead text-center" :colspan="columns.length + 1">No data found.</td>
                            </tr>
                            <tr v-for="(data, key1) in socks" :key="data.id" class="m-datatable__row" v-else>
                                <td>{{ serialNumber(key1) }}</td>
                                <td v-for="(value, key) in data">{{ value }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <nav v-if="pagination && socks.length > 0" class="mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item" :class="{'disabled' : currentPage === 1}">
                                <a class="page-link" href="#" @click.prevent="changePage(currentPage - 1)">Previous</a>
                            </li>
                            <li v-for="page in pagesNumber" class="page-item"
                                :class="{'active': page === pagination.current_page}">
                                <a href="javascript:void(0)" @click.prevent="changePage(page)" class="page-link">{{ page }}</a>
                            </li>
                            <li class="page-item" :class="{'disabled': currentPage === pagination.last_page }">
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

import DashboardService from '../../shared/services/dashboard.service';

export default {
    data() {
        return {
            socks: [],
            pagination: {},
            offset: 4,
            currentPage: 1,
            perPage: 20,
            sortedColumn: 'id',
            order: 'asc',
            columns: [],
        }
    },
    created() {
        return this.fetchData()
    },
    computed: {
        /**
         * Get the pages number array for displaying in the pagination.
         * */
        pagesNumber() {
            if (!this.pagination.next_page) {
                return []
            }
            let from = this.pagination.current_page - this.offset
            if (from < 1) {
                from = 1
            }
            let to = from + (this.offset * 2)
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page
            }
            let pagesArray = []
            for (let page = from; page <= to; page++) {
                pagesArray.push(page)
            }
            return pagesArray
        },
    },
    methods: {
        fetchData() {
            DashboardService.stocks({page: this.currentPage, column: this.sortedColumn, order: this.order, per_page: this.perPage}).then((response) => {
                this.socks = response.stocks;
                this.pagination = response.pagination;
                this.columns = ['id', 'symbol', 'price', 'securityName', 'market', 'securityType', 'country', 'pct1Day', 'shortInterest', 'shortInterestPercent', 'volume', 'isBank'];
            });
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
