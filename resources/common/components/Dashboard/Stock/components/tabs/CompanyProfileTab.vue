<template>
    <div class="tab-pane" id="company-profile" role="tabpanel">
        <div class="row">
            <div class="col-lg-3">
                <div v-if="stock.companyProfile">
                    <p v-html="address1"></p>
                    <p v-html="address2"></p>
                    <p v-html="address3"></p>
                    <hr>
                    <p>
                        <a :href="'mailto:' + stock.companyProfile.email" target="_blank" v-html="email"></a>
                    </p>
                    <p v-html="phone"></p>
                    <p>
                        <a :href="stock.companyProfile.website" target="_blank" v-html="website"></a>
                    </p>
                </div>
            </div>
            <div class="col-lg-9">
                <div v-if="stock.companyProfile">
                    <h3>Company Description</h3>
                    <p v-html="businessDesc"></p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "CompanyProfileTab",
      props: ['stock'],
      computed:{
          address1(){
              if(!this.stock.companyProfile) return null;
              return this.listen('companyProfile.address1', this.stock.companyProfile.address1);
          },
          address2(){
              if(!this.stock.companyProfile) return null;
              return this.listen('companyProfile.address2', this.stock.companyProfile.address2);
          },
          address3(){
              if(!this.stock.companyProfile) return null;
              return this.listen('companyProfile.city', this.stock.companyProfile.city) + ',' +
                  this.listen('companyProfile.state', this.stock.companyProfile.state) + ' ' +
                  this.listen('companyProfile.zip', this.stock.companyProfile.zip);
          },
          email(){
              if(!this.stock.companyProfile) return null;
              return this.listen('companyProfile.email', this.stock.companyProfile.email);

          },
          phone(){
              if(!this.stock.companyProfile) return null;
              return this.listen('companyProfile.phone', this.stock.companyProfile.phone);
          },
          website(){
              if(!this.stock.companyProfile) return null;
              return this.listen('companyProfile.website', this.stock.companyProfile.website);
          },
          businessDesc(){
              if(!this.stock.companyProfile) return null;
              return this.listen('companyProfile.businessDesc', this.stock.companyProfile.businessDesc);
          }
      }
  }
</script>

<style scoped>

</style>
