<template>
    <div class="tab-pane active" id="overview" role="tabpanel">
        <div class="row">
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Open</span>
                    <p v-if="stock.overview" class="fw-bold value" v-html="openingPrice"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Daily Range</span>
                    <p v-if="stock.overview" class="fw-bold value">
                        <span v-if="stock.overview.dailyLow" v-html="dailyLow"></span>
                        <span v-if="stock.overview.dailyLow && stock.overview.dailyHigh">-</span>
                        <span v-if="stock.overview.dailyHigh" v-html="dailyHigh"></span>
                    </p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Volume</span>
                    <!--                                        .volume-->
                    <p v-if="stock.overview" class="fw-bold value" v-html="volumeFormatted"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Market Cap</span>
                    <p v-if="stock.overview" class="fw-bold value" v-html="marketCap"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "OverviewTab",
      props:['stock'],
      computed:{
        openingPrice(){
            if(!this.stock.overview) return null;
            return this.listen('overview.openingPrice',this.stock.overview.openingPrice)
        },
        dailyLow(){
            if(!this.stock.overview) return null;
            return this.listen('overview.dailyLow',this.stock.overview.dailyLow)
        },
        dailyHigh(){
            if(!this.stock.overview) return null;
            return this.listen('overview.dailyHigh',this.stock.overview.dailyHigh)
        },
        volumeFormatted(){
            if(!this.stock.overview) return null;
            return this.listen('overview.volumeFormatted', this.stock.overview.volumeFormatted);
        },
        marketCap(){
            if(!this.stock.overview) return null;
            return this.listen('overview.marketCap', this.stock.overview.marketCap);
        }
      }
  }
</script>

<style scoped>

</style>
