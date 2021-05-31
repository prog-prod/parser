<template>
    <div>
        <h6>Filter Market</h6>
        <div class="d-flex  me-3">
            <v-select :options="marketList" class="filter-select" @input="filterMarket"
                      placeholder="Choose a market" :model.sync="market" multiple></v-select>
        </div>
    </div>
</template>

<script>
    import StockService from '../../../../shared/services/stock.service';
    export default {
        name: "FilterMarket",
        data: function () {
            return {
                market: null,
                marketList: []
            }
        },
        methods: {
            filterMarket(val) {
                this.$emit(`filter-market`, val)
            },
            async fetchMarketList() {
                const res = await StockService.getMarketList();
                this.marketList = res.marketList
            }
        },
        async created() {
            await this.fetchMarketList();
        }
    }
</script>

<style lang="scss">
    .filter-select{
        min-width: 160px;
    }
</style>
