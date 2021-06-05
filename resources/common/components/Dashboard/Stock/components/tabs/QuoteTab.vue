<template>
    <div class="tab-pane" id="quote" role="tabpanel">
        <div class="row">
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Open</span>
                    <p v-if="STOCK.overview" class="fw-bold value">{{ openingPrice }}</p>
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
                    <span>Dividend</span>
                    <p v-if="STOCK.overview" class="fw-bold value" v-html="dividend"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Prev Close</span>
                    <p v-if="STOCK.overview" class="fw-bold value" v-html="previousClose"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>52WK Range</span>
                    <p v-if="STOCK.overview" class="fw-bold value">
                        <span v-if="STOCK.overview.annualLow" v-html="annualLow"></span>
                        <span v-if="STOCK.overview.annualLow && STOCK.overview.annualHigh">-</span>
                        <span v-if="STOCK.overview.annualHigh" v-html="annualHigh"></span>
                    </p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Average Vol (30D)</span>
                    <p v-if="STOCK.overview" class="fw-bold value" v-html="thirtyDaysAvgVol"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Net Dividend Yield</span>
                    <p v-if="STOCK.overview" class="fw-bold value" v-html="_yield"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Best Bid</span>
                    <p v-if="STOCK.overview" class="fw-bold value" v-html="bestBid"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Best Ask</span>
                    <p v-if="STOCK.overview" class="fw-bold value" v-html="bestAsk"></p>
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
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Shares Out</span>
                    <p v-if="STOCK.overview" class="fw-bold value" v-html="sharesOutstanding"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import {mapGetters} from "vuex";

  export default {
    name: "QuoteTab",
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
          dividend(){
              if(!this.STOCK.overview) return null;
              return this.listen('overview.dividend', this.STOCK.overview.dividend);
          },
          previousClose(){
              if(!this.STOCK.overview) return null;
              return this.listen('overview.previousClose', this.STOCK.overview.previousClose);
          },
          annualLow(){
              if(!this.STOCK.overview) return null;
              return this.listen('overview.annualLow', this.STOCK.overview.annualLow);
          },
          annualHigh(){
              if(!this.STOCK.overview) return null;
              return this.listen('overview.annualHigh', this.STOCK.overview.annualHigh);
          },
          thirtyDaysAvgVol(){
              if(!this.STOCK.overview) return null;
              return this.listen('overview.thirtyDaysAvgVol', this.STOCK.overview.thirtyDaysAvgVol);
          },
          _yield(){
              if(!this.STOCK.overview) return null;
              return this.listen('overview.yield', this.STOCK.overview.yield);
          },
          bestBid(){
              if(!this.STOCK.overview) return null;
              return this.listen('overview.bidPrice', this.STOCK.overview.bidPrice)
                  + 'x' + this.listen('overview.bidPrice', this.STOCK.overview.bidSize);
          },
          bestAsk(){
              if(!this.STOCK.overview) return null;
              return this.listen('overview.askPrice', this.STOCK.overview.bidPrice)
                  + 'x' + this.listen('overview.askSize', this.STOCK.overview.bidSize);
          },
          marketCap(){
              if(!this.STOCK.overview) return null;
              return this.listen('overview.marketCap', this.STOCK.overview.marketCap);
          },
          sharesOutstanding(){
              if(!this.STOCK.overview) return null;
              return this.listen('overview.sharesOutstanding', this.STOCK.overview.sharesOutstanding);
          }
      }
  }
</script>

<style scoped>

</style>
