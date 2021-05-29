<template>
    <div>Filter Pice
        <div class="d-flex">
            <div class="d-flex me-3">
                <label for="filter-price-min" class="col-form-label me-1">Min</label>
                <input class="form-control" type="number" @change="filterPrice('min')" v-model="price.min" id="filter-price-min">
            </div>
            <div class="d-flex">
                <label for="filter-price-max" class="col-form-label me-1">Max</label>
                <input class="form-control" type="number" @change="filterPrice('max')" v-model="price.max" id="filter-price-max">
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "FilterPrice",
      data: function() {
        return {
            price: {
                min:null,
                max:null,
            },
        }
      },
      methods:{
          filterPrice(type){
            this.$emit(`${type}-price`, this.price[type])
          }
      }
  }
</script>
