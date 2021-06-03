<template>
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <div class="w-100">
                    <h1>{{ symbol }}</h1>
                    <p>{{ securityName }}</p>
                </div>
                <div class="w-100">
                    <ul>
                        <li v-if="stock.companyProfile && stock.companyProfile.isProfileVerified">
                            <img src="/assets/images/verified-profile.png" alt="Verified Profile Icon">
                            <span>Verified Profile ({{ profileVerifiedAsOfDate }})</span>
                        </li>
                        <li v-else>
                            <span>Verified Profile - No</span>
                        </li>
                    </ul>
                    <hr>
                    <div>
                        <h3>Indexes</h3>
                        <div v-if="stock.companyProfile && stock.companyProfile.indexStatuses && stock.companyProfile.indexStatuses.length > 0">
                            <div v-for="index in indexStatuses" class="index" :class="{'column-updated':listen('companyProfile.indexStatuses')}">
                                {{ index.indexSymbol }} - {{ index.indexName }} <span>Index</span>
                            </div>
                        </div>
                        <div v-else>
                            <div class="index not">Not Available</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import {mapGetters} from "vuex";

  export default {
    name: "DetailsCard",
      props:['stock'],
      computed:{
        ...mapGetters(['STOCK_UPDATED_COLUMNS']),
          symbol(){
              return this.listen('symbol',this.stock.symbol)
          },
          securityName(){
            return this.listen('securityName',this.stock.securityName);
          },
          profileVerifiedAsOfDate(){
              return this.listen('companyProfile.profileVerifiedAsOfDate', this.stock.companyProfile.profileVerifiedAsOfDate)
          },
          indexStatuses(){
              return this.listen('companyProfile.indexStatuses',this.stock.companyProfile.indexStatuses)
          }
      },
      async beforeCreate() {
          await this.$store.dispatch('GET_STOCK_UPDATED_COLUMNS',{ stock_id: this.$route.params.id })
      },
      mounted() {
        // console.log(this.STOCK_UPDATED_COLUMNS)
      }
  }
</script>

<style scoped>

</style>
