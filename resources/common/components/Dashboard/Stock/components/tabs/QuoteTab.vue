<template>
    <div class="tab-pane" id="quote" role="tabpanel">
        <div class="row">
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Open</span>
                    <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.openingPrice }}</p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Daily Range</span>
                    <p v-if="stock.overview" class="fw-bold value">
                        <span v-if="stock.overview.dailyLow">{{ stock.overview.dailyLow }}</span>
                        <span v-if="stock.overview.dailyLow && stock.overview.dailyHigh">-</span>
                        <span v-if="stock.overview.dailyHigh">{{ stock.overview.dailyHigh }}</span>
                    </p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Volume</span>
                    <!--                                        .volume-->
                    <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.volumeFormatted }}</p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Dividend</span>
                    <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.dividend }}</p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Prev Close</span>
                    <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.previousClose }}</p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>52WK Range</span>
                    <p v-if="stock.overview" class="fw-bold value">
                        <span v-if="stock.overview.annualLow">{{ stock.overview.annualLow }}</span>
                        <span v-if="stock.overview.annualLow && stock.overview.annualHigh">-</span>
                        <span v-if="stock.overview.annualHigh">{{ stock.overview.annualHigh }}</span>
                    </p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Average Vol (30D)</span>
                    <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.thirtyDaysAvgVol }}</p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Net Dividend Yield</span>
                    <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.yield }}</p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Best Bid</span>
                    <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.bidPrice }} x {{ stock.overview.bidSize }}</p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Best Ask</span>
                    <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.askPrice }} x {{ stock.overview.askSize }}</p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Market Cap</span>
                    <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.marketCap }}</p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="item justify-content-center position-relative text-center">
                    <span>Shares Out</span>
                    <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.sharesOutstanding }}</p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "QuoteTab",
      props:['stock']
  }
</script>

<style scoped>

</style>
