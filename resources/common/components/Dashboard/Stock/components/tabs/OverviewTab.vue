<template>
    <div class="tab-pane active" id="overview" role="tabpanel">
        <div class="row">
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Open</span>
                    <p v-if="STOCK.overview" class="fw-bold value" v-html="openingPrice"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Daily Range</span>
                    <p v-if="STOCK.overview" class="fw-bold value">
                        <span v-if="STOCK.overview.dailyLow" v-html="dailyLow"></span>
                        <span v-if="STOCK.overview.dailyLow && STOCK.overview.dailyHigh">-</span>
                        <span v-if="STOCK.overview.dailyHigh" v-html="dailyHigh"></span>
                    </p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Volume</span>
                    <!--                                        .volume-->
                    <p v-if="STOCK.overview" class="fw-bold value" v-html="volumeFormatted"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Market Cap</span>
                    <p v-if="STOCK.overview" class="fw-bold value" v-html="marketCap"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import {mapGetters} from "vuex";

  export default {
    name: "OverviewTab",
      computed:{
          ...mapGetters(['STOCK']),
        openingPrice(){
            if(!this.STOCK.overview) return null;
            return this.listen('overview.openingPrice',this.STOCK.overview.openingPrice)
        },
        dailyLow(){
            if(!this.STOCK.overview) return null;
            return this.listen('overview.dailyLow',this.STOCK.overview.dailyLow)
        },
        dailyHigh(){
            if(!this.STOCK.overview) return null;
            return this.listen('overview.dailyHigh',this.STOCK.overview.dailyHigh)
        },
        volumeFormatted(){
            if(!this.STOCK.overview) return null;
            return this.listen('overview.volumeFormatted', this.STOCK.overview.volumeFormatted);
        },
        marketCap(){
            if(!this.STOCK.overview) return null;
            return this.listen('overview.marketCap', this.STOCK.overview.marketCap);
        }
      }
  }
</script>

<style scoped>

</style>
