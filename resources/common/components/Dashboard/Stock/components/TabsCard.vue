<template>
    <div class="card">
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-pills nav-justified bg-light" role="tablist">
                <li class="nav-item waves-effect waves-light" v-for="tab in tabs">
                    <a class="nav-link" :class="{'active':tab.id === 'overview'}" data-bs-toggle="tab" :href="`#${tab.id}`" role="tab" :aria-selected="tab.id === 'overview'">
                        <span class="d-block d-sm-none"><i :class="tab.icon"></i></span>
                        <span class="d-none d-sm-block">{{tab.text}}</span>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-3 pt-4 text-muted">
                <OverviewTab/>
                <QuoteTab/>
                <CompanyProfileTab/>
                <SecurityDetailsTab/>
                <div v-for="tab in ['news', 'financials', 'disclosure', 'research']" class="tab-pane" :id="tab" role="tabpanel">
                    <p class="mb-0">
                        Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                        art party before they sold out master cleanse gluten-free squid
                        scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                        art party locavore wolf cliche high life echo park Austin. Cred
                        vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                        farm-to-table.
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import SecurityDetailsTab from "./tabs/SecurityDetailsTab";
  import CompanyProfileTab from "./tabs/CompanyProfileTab";
  import QuoteTab from "./tabs/QuoteTab";
  import OverviewTab from "./tabs/OverviewTab";
  import {mapGetters} from "vuex";

  export default {
      components: {SecurityDetailsTab, CompanyProfileTab, QuoteTab, OverviewTab},
      name: "TabsCard",
      data: () => ({
          tabs: [
              { text: 'Overview', id: 'overview', icon : 'fas fa-home'},
              { text: 'Quote', id: 'quote', icon : 'far fa-user'},
              { text: 'Company Profile', id: 'company-profile', icon : 'far fa-envelope'},
              { text: 'Security Details', id: 'security-details', icon : 'fas fa-cog'},
              { text: 'News', id: 'news', icon : 'fas fa-cog'},
              // { text: 'Financials', id: 'financials', icon : 'fas fa-cog'},
              // { text: 'Disclosure', id: 'disclosure', icon : 'fas fa-cog'},
              // { text: 'Research', id: 'research', icon : 'fas fa-cog'},
          ]
      })
  }
</script>

<style scoped>

</style>
