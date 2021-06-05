<template>
    <div class="tab-pane" id="company-profile" role="tabpanel">
        <div class="row">
            <div class="col-lg-3">
                <div v-if="STOCK.companyProfile">
                    <p v-html="address1"></p>
                    <p v-html="address2"></p>
                    <p v-html="address3"></p>
                    <hr>
                    <p>
                        <a :href="'mailto:' + STOCK.companyProfile.email" target="_blank" v-html="email"></a>
                    </p>
                    <p v-html="phone"></p>
                    <p>
                        <a :href="STOCK.companyProfile.website" target="_blank" v-html="website"></a>
                    </p>
                </div>
            </div>
            <div class="col-lg-9">
                <div v-if="STOCK.companyProfile">
                    <h3>Company Description</h3>
                    <p v-html="businessDesc"></p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import {mapGetters} from "vuex";

  export default {
    name: "CompanyProfileTab",
      computed:{
        ...mapGetters(['STOCK']),
          address1(){
              if(!this.STOCK.companyProfile) return null;
              return this.listen('companyProfile.address1', this.STOCK.companyProfile.address1);
          },
          address2(){
              if(!this.STOCK.companyProfile) return null;
              return this.listen('companyProfile.address2', this.STOCK.companyProfile.address2);
          },
          address3(){
              if(!this.STOCK.companyProfile) return null;
              return this.listen('companyProfile.city', this.STOCK.companyProfile.city) + ',' +
                  this.listen('companyProfile.state', this.STOCK.companyProfile.state) + ' ' +
                  this.listen('companyProfile.zip', this.STOCK.companyProfile.zip);
          },
          email(){
              if(!this.STOCK.companyProfile) return null;
              return this.listen('companyProfile.email', this.STOCK.companyProfile.email);

          },
          phone(){
              if(!this.STOCK.companyProfile) return null;
              return this.listen('companyProfile.phone', this.STOCK.companyProfile.phone);
          },
          website(){
              if(!this.STOCK.companyProfile) return null;
              return this.listen('companyProfile.website', this.STOCK.companyProfile.website);
          },
          businessDesc(){
              if(!this.STOCK.companyProfile) return null;
              return this.listen('companyProfile.businessDesc', this.STOCK.companyProfile.businessDesc);
          }
      }
  }
</script>

<style scoped>

</style>
