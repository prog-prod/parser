<template>
    <div class="tab-pane" id="quote" role="tabpanel">
        <div class="row">
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Open</span>
                    <p v-if="stock.overview" class="fw-bold value">{{ openingPrice }}</p>
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
                    <span>Dividend</span>
                    <p v-if="stock.overview" class="fw-bold value" v-html="dividend"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Prev Close</span>
                    <p v-if="stock.overview" class="fw-bold value" v-html="previousClose"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>52WK Range</span>
                    <p v-if="stock.overview" class="fw-bold value">
                        <span v-if="stock.overview.annualLow" v-html="annualLow"></span>
                        <span v-if="stock.overview.annualLow && stock.overview.annualHigh">-</span>
                        <span v-if="stock.overview.annualHigh" v-html="annualHigh"></span>
                    </p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Average Vol (30D)</span>
                    <p v-if="stock.overview" class="fw-bold value" v-html="thirtyDaysAvgVol"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Net Dividend Yield</span>
                    <p v-if="stock.overview" class="fw-bold value" v-html="_yield"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Best Bid</span>
                    <p v-if="stock.overview" class="fw-bold value" v-html="bestBid"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Best Ask</span>
                    <p v-if="stock.overview" class="fw-bold value" v-html="bestAsk"></p>
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
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Shares Out</span>
                    <p v-if="stock.overview" class="fw-bold value" v-html="sharesOutstanding"></p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "QuoteTab",
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
          dividend(){
              if(!this.stock.overview) return null;
              return this.listen('overview.dividend', this.stock.overview.dividend);
          },
          previousClose(){
              if(!this.stock.overview) return null;
              return this.listen('overview.previousClose', this.stock.overview.previousClose);
          },
          annualLow(){
              if(!this.stock.overview) return null;
              return this.listen('overview.annualLow', this.stock.overview.annualLow);
          },
          annualHigh(){
              if(!this.stock.overview) return null;
              return this.listen('overview.annualHigh', this.stock.overview.annualHigh);
          },
          thirtyDaysAvgVol(){
              if(!this.stock.overview) return null;
              return this.listen('overview.thirtyDaysAvgVol', this.stock.overview.thirtyDaysAvgVol);
          },
          _yield(){
              if(!this.stock.overview) return null;
              return this.listen('overview.yield', this.stock.overview.yield);
          },
          bestBid(){
              if(!this.stock.overview) return null;
              return this.listen('overview.bidPrice', this.stock.overview.bidPrice)
                  + 'x' + this.listen('overview.bidPrice', this.stock.overview.bidSize);
          },
          bestAsk(){
              if(!this.stock.overview) return null;
              return this.listen('overview.askPrice', this.stock.overview.bidPrice)
                  + 'x' + this.listen('overview.askSize', this.stock.overview.bidSize);
          },
          marketCap(){
              if(!this.stock.overview) return null;
              return this.listen('overview.marketCap', this.stock.overview.marketCap);
          },
          sharesOutstanding(){
              if(!this.stock.overview) return null;
              return this.listen('overview.sharesOutstanding', this.stock.overview.sharesOutstanding);
          }
      }
  }
</script>

<style scoped>

</style>
