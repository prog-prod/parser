<template>
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <div class="w-100">
                    <h1 v-html="symbol"></h1>
                    <p v-html="securityName"></p>
                </div>
                <div class="w-100">
                    <ul>
                        <li v-if="STOCK.companyProfile && STOCK.companyProfile.isProfileVerified">
                            <img src="/assets/images/verified-profile.png" alt="Verified Profile Icon">
                            <span :class="{'column-updated': profileVerifiedAsOfDate}">
                                Verified Profile ({{ profileVerifiedAsOfDate }})
                            </span>
                        </li>
                        <li v-else>
                            <span>Verified Profile - No</span>
                        </li>
                    </ul>
                    <hr>
                    <div>
                        <h3>Indexes</h3>
                        <div v-if="STOCK.companyProfile && STOCK.companyProfile.indexStatuses && STOCK.companyProfile.indexStatuses.length > 0">
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
      computed:{
        ...mapGetters(['STOCK_UPDATED_COLUMNS','STOCK']),
          symbol(){
              if(!this.STOCK.symbol) return '';
              return this.listen('symbol',this.STOCK.symbol)
          },
          securityName(){
            if(!this.STOCK.securityName) return '';
            return this.listen('securityName',this.STOCK.securityName);
          },
          profileVerifiedAsOfDate(){
              if(!this.STOCK.companyProfile) return '';
              return this.listen('companyProfile.profileVerifiedAsOfDate', this.STOCK.companyProfile.profileVerifiedAsOfDate)
          },
          indexStatuses(){
              if(!this.STOCK.companyProfile) return '';
              return this.listen('companyProfile.indexStatuses',this.STOCK.companyProfile.indexStatuses)
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
    .index{
        margin: 5px 0;
    }
</style>
