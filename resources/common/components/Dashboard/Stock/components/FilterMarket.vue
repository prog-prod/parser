<template>
    <div>
        <div class="card">
            <div class="card-header" data-bs-toggle="collapse" href="#collapseFilterMarket" role="button" aria-expanded="false" aria-controls="collapseFilterMarket">
                <h6>Filter Market</h6>
            </div>
            <div class="collapse" id="collapseFilterMarket">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="d-flex me-3">
                            <label for="filter-market" class="col-form-label me-1">Market</label>
                            <select class="form-control" @change="filterMarket" v-model="market" id="filter-market">
                                <option value="" v-for=""></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import StockService from '../../../../shared/services/stock.service';

    export default {
        name: "FilterPrice",
        data: function() {
            return {
                market:null,
                marketList: []
            }
        },
        methods:{
            filterMarket(){
                this.$emit(`market`, this.market)
            },
            async fetchMarketList(){
                const res = await StockService.getMarketList();
                console.log(res)
                this.marketList = res.data
            }
        },
        created() {
            this.fetchMarketList();
        }
    }
</script>
