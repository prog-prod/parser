<template>
    <div>
        <h6>Filter Symbol</h6>
        <div>
            <input class="form-control" type="text" @change="filterSymbol" @keydown.enter="filterSymbol" v-model="symbol"
                   placeholder="Search symbol..." id="filter-symbol">
        </div>
    </div>
</template>

<script>
  export default {
    name: "FilterSymbol",
      data: () => ({
          symbol: null,
      }),
      methods:{
          filterSymbol(){
              return this.$emit('filter-symbol',this.symbol)
          }
      }
  }
</script>

<style scoped>

</style>
