<template>
    <div class="card">
        <div class="card-header" data-bs-toggle="collapse" href="#collapseFilters" role="button" aria-expanded="false" aria-controls="collapseFilters">
            <h6>Filters</h6>
        </div>
        <div class="collapse" id="collapseFilters">
            <div class="card-body p-3">
                <div class="row justify-content-between">
                    <div class="col-sm-12 col-md-4"><FilterPrice @max-price="maxPrice" @min-price="minPrice"/></div>
                    <div class="col-sm-12 col-md-4 "><FilterMarket @filter-market="filterMarket" class="mt-3"/></div>
                </div>


            </div>
        </div>
    </div>
</template>

<script>
  import FilterPrice from "./FilterPrice";
  import FilterMarket from "./FilterMarket";
  export default {
    name: "FiltersComponent",
      components: {FilterMarket, FilterPrice},
      methods:{
          minPrice: function(value) { this.$emit('min-price', value) },
          maxPrice: function (value) { this.$emit('max-price', value) },
          filterMarket: function(value) { this.$emit('filter-market', value) }
      }
  }
</script>

<style scoped>

</style>
