<template>
    <div class="tab-pane" id="security-details" role="tabpanel">
        <div class="row">
            <div class="col-lg-12">
                <h2>{{ stock.symbol }} Security Details</h2>
                <hr>
                <h3>Share Structure</h3>
                <hr>
                <div class="w-100 share-structure">
                    <div>
                        <div class="d-flex">
                            <span class="w-100">Market Cap</span>
                            <span v-if="stock.overview" class="w-100">{{ stock.overview.marketCap }}</span>
                            <span v-else class="w-100">Not Available</span>

                            <span v-if="stock.companyProfile && stock.overview && stock.companyProfile.estimatedMarketCapAsOfDate" class="w-100">
                                                    {{ dateConvert(stock.companyProfile.estimatedMarketCapAsOfDate) }}
                                                </span>
                            <span v-else class="w-100">Not Available</span>
                        </div>
                    </div>
                    <div v-if="stock.companyProfile && stock.companyProfile.securities">
                        <div v-for="security in stock.companyProfile.securities">
                            <div v-if="security.authorizedShares" class="d-flex">
                                <span class="w-100">Authorized Shares</span>
                                <span class="w-100">{{ numberFormat(security.authorizedShares) }}</span>
                                <span class="w-100">{{ dateConvert(security.authorizedSharesAsOfDate) }}</span>
                            </div>
                            <div v-else class="d-flex">
                                <span class="w-100">Authorized Shares</span>
                                <span class="w-100">Not Available</span>
                                <span class="w-100"></span>
                            </div>
                            <div v-if="security.outstandingShares" class="d-flex">
                                <span class="w-100">Outstanding Shares</span>
                                <span class="w-100">{{ numberFormat(security.outstandingShares) }}</span>
                                <span class="w-100">{{ dateConvert(security.outstandingSharesAsOfDate) }}</span>
                            </div>
                            <div v-if="security.outstandingShares" class="d-flex">
                                                    <span class="w-100 helper">
                                                        <span>Restricted</span>
                                                    </span>

                                <span v-if="security.restrictedShares" class="w-100 helper">{{ numberFormat(security.restrictedShares) }}</span>
                                <span v-else class="w-100 helper">Not Available</span>

                                <span v-if="security.restrictedSharesAsOfDate" class="w-100 helper">{{ dateConvert(security.restrictedSharesAsOfDate) }}</span>
                                <span v-else class="w-100"></span>
                            </div>
                            <div v-if="security.outstandingShares" class="d-flex">
                                                    <span class="w-100 helper">
                                                        <span>Unrestricted</span>
                                                    </span>

                                <span v-if="security.unrestrictedShares" class="w-100 helper">{{ numberFormat(security.unrestrictedShares) }}</span>
                                <span v-else class="w-100 helper">Not Available</span>

                                <span v-if="security.unrestrictedSharesAsOfDate" class="w-100 helper">{{ dateConvert(security.unrestrictedSharesAsOfDate) }}</span>
                                <span v-else class="w-100"></span>
                            </div>
                            <div v-if="security.dtcShares" class="d-flex">
                                <span class="w-100">Held at DTC</span>
                                <span class="w-100">{{ numberFormat(security.dtcShares) }}</span>
                                <span class="w-100">{{ dateConvert(security.dtcSharesAsOfDate) }}</span>
                            </div>
                            <div v-if="security.publicFloat" class="d-flex">
                                <span class="w-100">Float</span>
                                <span class="w-100">{{ numberFormat(security.publicFloat) }}</span>
                                <span class="w-100">{{ dateConvert(security.publicFloatAsOfDate) }}</span>
                            </div>
                            <div v-if="security.parValue" class="d-flex">
                                <span class="w-100">Par Value</span>
                                <span class="w-100">{{ security.parValue }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="mt-4">Transfer Agent</h3>
                        <hr>
                        <div v-if="stock.companyProfile">
                            <div v-if="stock.companyProfile.securities">
                                <div v-for="security in stock.companyProfile.securities">
                                    <div v-if="security.transferAgents">
                                        <div v-for="transfer in security.transferAgents">
                                            <a :href="'https://www.otcmarkets.com/learn/service-providers/' +  transfer.id + '?t=6'" target="_blank">{{ transfer.name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-else>
                                Not Available
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="mt-4">Shareholders</h3>
                        <hr>
                        <div v-if="stock.companyProfile">
                            <div v-if="stock.companyProfile.numberOfRecordShareholders">
                                <div class="d-flex">
                                    <div>
                                        <strong>Shareholders of Record</strong> <span>{{ stock.companyProfile.numberOfRecordShareholders }}</span>
                                    </div>
                                    <div>
                                        {{ dateConvert(stock.companyProfile.numberOfRecordShareholdersDate) }}
                                    </div>
                                </div>
                            </div>
                            <div v-else>
                                Not Available
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <h3 class="mt-4">Corporate Actions</h3>
                <hr>
                <table class="w-100">
                    <thead>
                    <tr>
                        <th>Action Type</th>
                        <th>Effective Date</th>
                        <th>Symbol</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody v-if="stock.corporateActions && stock.corporateActions.length > 0">
                    <tr v-for="action in stock.corporateActions">
                        <td>{{ action.actionType }}</td>
                        <td>{{ stock.symbol }}</td>
                        <td>{{ dateConvert(action.changeDate) }}</td>
                        <td>{{ action.comments }}</td>
                    </tr>
                    </tbody>
                    <tbody v-else>
                    <tr>
                        <td colspan="4" class="text-center">Not Available</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "SecurityDetailsTab",
      props:['stock'],
      methods: {
          dateConvert: function(unixTime)
          {
              unixTime = (unixTime - (unixTime % 1000)) / 1000;
              let a = new Date(unixTime * 1000);
              let months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
              let year = a.getFullYear();
              let month = months[a.getMonth()];
              let date = a.getDate();
              let hour = a.getHours();
              let min = a.getMinutes();
              let sec = a.getSeconds();

              return date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
          },
          numberFormat: function(number, decimals, dec_point, thousands_sep)
          {
              // Strip all characters but numerical ones.
              number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
              let n = !isFinite(+number) ? 0 : +number,
                  prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                  sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                  dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                  s = '',
                  toFixedFix = function (n, prec) {
                      var k = Math.pow(10, prec);
                      return '' + Math.round(n * k) / k;
                  };

              // Fix for IE parseFloat(0.55).toFixed(0) = 0;
              s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
              if (s[0].length > 3) {
                  s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
              }
              if ((s[1] || '').length < prec) {
                  s[1] = s[1] || '';
                  s[1] += new Array(prec - s[1].length + 1).join('0');
              }
              return s.join(dec);
          }
      }
  }
</script>

<style scoped>

</style>
