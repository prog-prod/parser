<template>
    <div class="tab-pane" id="company-profile" role="tabpanel">
        <div class="row">
            <div class="col-lg-3">
                <div v-if="stock.companyProfile">
                    <p>{{ stock.companyProfile.address1 }}</p>
                    <p>{{ stock.companyProfile.address2 }}</p>
                    <p>{{ stock.companyProfile.city }}, {{ stock.companyProfile.state }} {{ stock.companyProfile.zip}}</p>
                    <hr>
                    <p>
                        <a :href="'mailto:' + stock.companyProfile.email" target="_blank">
                            {{ stock.companyProfile.email }}
                        </a>
                    </p>
                    <p>{{ stock.companyProfile.phone }}</p>
                    <p>
                        <a :href="stock.companyProfile.website" target="_blank">
                            {{ stock.companyProfile.website }}
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-lg-9">
                <div v-if="stock.companyProfile">
                    <h3>Company Description</h3>
                    <p>{{ stock.companyProfile.businessDesc }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "CompanyProfileTab",
      props: ['stock']
  }
</script>

<style scoped>

</style>
