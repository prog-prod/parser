<template>
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <div class="w-100">
                    <h1>{{ stock.symbol }}</h1>
                    <p>{{ stock.securityName }}</p>
                </div>
                <div class="w-100">
                    <ul>
                        <li v-if="stock.companyProfile && stock.companyProfile.isProfileVerified">
                            <img src="/assets/images/verified-profile.png" alt="Verified Profile Icon">
                            <span>Verified Profile ({{ stock.companyProfile.profileVerifiedAsOfDate }})</span>
                        </li>
                        <li v-else>
                            <span>Verified Profile - No</span>
                        </li>
                    </ul>
                    <hr>
                    <div>
                        <h3>Indexes</h3>
                        <div v-if="stock.companyProfile && stock.companyProfile.indexStatuses && stock.companyProfile.indexStatuses.length > 0">
                            <div v-for="index in stock.companyProfile.indexStatuses" class="index">
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
  export default {
    name: "DetailsCard",
      props:['stock']
  }
</script>

<style scoped>

</style>
