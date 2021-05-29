<template>
    <div class="tab-pane active" id="overview" role="tabpanel">
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
                    <span>Market Cap</span>
                    <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.marketCap }}</p>
                    <p v-else class="fw-bold value">0</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "OverviewTab",
      props:['stock']
  }
</script>

<style scoped>

</style>
