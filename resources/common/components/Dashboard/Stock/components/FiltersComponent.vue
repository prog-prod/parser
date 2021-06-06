<template>
    <div class="card">
        <div class="card-header" data-bs-toggle="collapse" href="#collapseFilters" role="button" aria-expanded="false" aria-controls="collapseFilters">
            <h6>Filters</h6>
        </div>
        <div class="collapse" id="collapseFilters">
            <div class="card-body p-3">
                <div class="d-flex justify-content-md-between">
                    <div><FilterPrice @max-price="maxPrice" @min-price="minPrice"/></div>
                    <div><FilterMarket @filter-market="filterMarket"/></div>
                    <div><FilterCountry @filter-country="filterCountry"/></div>
                    <div><FilterSymbol @filter-symbol="filterSymbol"/></div>
                    <div><FilterViewed @filter-viewed="filterViewed"/></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import FilterPrice from "./FilterPrice";
  import FilterMarket from "./FilterMarket";
  import FilterCountry from "./FilterCountry";
  import FilterSymbol from "./FilterSymbol";
  import FilterViewed from "./FilterViewed";
  export default {
    name: "FiltersComponent",
      components: {FilterViewed, FilterSymbol, FilterCountry, FilterMarket, FilterPrice},
      methods:{
          minPrice: function(value) { this.$emit('min-price', value) },
          maxPrice: function (value) { this.$emit('max-price', value) },
          filterMarket: function(value) { this.$emit('filter-market', value) },
          filterCountry: function(value) { this.$emit('filter-country', value) },
          filterSymbol: function(value) { this.$emit('filter-symbol', value) },
          filterViewed: function(value) { this.$emit('filter-viewed', value.code) }
      }
  }
</script>

<style lang="scss">
    .filter-select{
        min-width: 160px;
    }
</style>
