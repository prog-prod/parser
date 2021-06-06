<template>
    <div>
        <h6>Filter Checked\Unchecked</h6>
        <div class="d-flex  me-3">
            <v-select :options="viewedList" class="filter-select" label="label" @input="filterViewed"
                      :model.sync="viewed"></v-select>
        </div>
    </div>
</template>

<script>
  export default {
    name: "FilterViewed",
      data: () => ({
          viewed: null,
          viewedList: [
              { label:'All', code: 'all'},
              { label:'Viewed after update', code: 'checked'},
              { label:'Not viewed', code:'unchecked'}
          ]
      }),
      methods:{
          filterViewed(val){
              return this.$emit(`filter-viewed`, val)
          }
      }
  }
</script>

<style scoped>

</style>
