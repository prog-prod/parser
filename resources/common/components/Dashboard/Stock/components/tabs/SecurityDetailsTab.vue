<template>
    <div class="tab-pane" id="security-details" role="tabpanel">
        <div class="row">
            <div class="col-lg-12">
                <h2>{{ symbol }} Security Details</h2>
                <hr>
                <h3>Share Structure</h3>
                <hr>
                <div class="w-100 share-structure">
                    <div>
                        <div class="d-flex">
                            <span class="w-100">Market Cap</span>
                            <span v-if="stock.overview" class="w-100" v-html="marketCap"></span>
                            <span v-else class="w-100">Not Available</span>

                            <span v-if="stock.companyProfile && stock.overview && stock.companyProfile.estimatedMarketCapAsOfDate" class="w-100" v-html="estimatedMarketCapAsOfDate"></span>
                            <span v-else class="w-100">Not Available</span>
                        </div>
                    </div>
                    <div v-if="stock.companyProfile && stock.companyProfile.securities">
                        <div v-for="(security,index) in stock.companyProfile.securities" :key="index">
                            <div v-if="security.authorizedShares" class="d-flex">
                                <span class="w-100">Authorized Shares</span>
                                <span class="w-100" v-html="security_authorizedShares(security,index)"></span>
                                <span class="w-100" v-html="security_authorizedSharesAsOfDate(security,index)"></span>
                            </div>
                            <div v-else class="d-flex">
                                <span class="w-100">Authorized Shares</span>
                                <span class="w-100">Not Available</span>
                                <span class="w-100"></span>
                            </div>
                            <div v-if="security.outstandingShares" class="d-flex">
                                <span class="w-100">Outstanding Shares</span>
                                <span class="w-100" v-html="security_outstandingShares(security, index)"></span>
                                <span class="w-100" v-html="security_outstandingSharesAsOfDate(security,index)"></span>
                            </div>
                            <div v-if="security.outstandingShares" class="d-flex">
                                                    <span class="w-100 helper">
                                                        <span>Restricted</span>
                                                    </span>

                                <span v-if="security.restrictedShares" class="w-100 helper" v-html="security_restrictedShares(security, index)"></span>
                                <span v-else class="w-100 helper">Not Available</span>

                                <span v-if="security.restrictedSharesAsOfDate" class="w-100 helper" v-html="security_restrictedSharesAsOfDate(security,index)"></span>
                                <span v-else class="w-100"></span>
                            </div>
                            <div v-if="security.outstandingShares" class="d-flex">
                                                    <span class="w-100 helper">
                                                        <span>Unrestricted</span>
                                                    </span>

                                <span v-if="security.unrestrictedShares" class="w-100 helper" v-html="security_unrestrictedShares(security, index)">{{ numberFormat(security.unrestrictedShares) }}</span>
                                <span v-else class="w-100 helper">Not Available</span>

                                <span v-if="security.unrestrictedSharesAsOfDate" class="w-100 helper" v-html="security_unrestrictedSharesAsOfDate(security,index)"></span>
                                <span v-else class="w-100"></span>
                            </div>
                            <div v-if="security.dtcShares" class="d-flex">
                                <span class="w-100">Held at DTC</span>
                                <span class="w-100" v-html="security_dtcShares(security,index)"></span>
                                <span class="w-100" v-html="security_dtcSharesAsOfDate(security,index)"></span>
                            </div>
                            <div v-if="security.publicFloat" class="d-flex">
                                <span class="w-100">Float</span>
                                <span class="w-100" v-html="security_publicFloat(security,index)(security, index)"></span>
                                <span class="w-100" v-html="security_publicFloatAsOfDate(security, index)"></span>
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
                                <div v-for="(security, security_index) in stock.companyProfile.securities">
                                    <div v-if="security.transferAgents">
                                        <div v-for="(transfer,transfer_index) in security.transferAgents">
                                            <a :href="'https://www.otcmarkets.com/learn/service-providers/' +  transfer.id + '?t=6'" :class="{'column-updated': security_transferAgents_id(transfer,security_index,transfer_index)}" target="_blank" v-html="security_transferAgents_name(transfer, security_index, transfer_index)"></a>
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
                                        <strong>Shareholders of Record</strong> <span v-html="numberOfRecordShareholders"></span>
                                    </div>
                                    <div v-html="numberOfRecordShareholdersDate"></div>
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
                    <tr v-for="(action, index) in stock.corporateActions">
                        <td v-html="action_actionType(action, index)"></td>
                        <td v-html="action_symbol(action,index)"></td>
                        <td v-html="action_changeDate(action,index)"></td>
                        <td v-html="action_comments(action,index)"></td>
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
    computed:{
      symbol(){
        return this.listen('symbol',this.stock.symbol)
      },
      marketCap(){
        if(!this.stock.overview) return null;
        return this.listen('overview.marketCap', this.stock.overview.marketCap);
      },
      estimatedMarketCapAsOfDate(){
        if(!this.stock.companyProfile) return null;
        return this.listen('companyProfile.estimatedMarketCapAsOfDate', this.dateConvert(this.stock.companyProfile.estimatedMarketCapAsOfDate));
      },
      // securities(){
      //   if(!this.stock.companyProfile) return null;
      //   return this.listen('companyProfile.securities', this.stock.companyProfile.securities, true);
      // },
      numberOfRecordShareholders(){
        if(!this.stock.companyProfile) return null;
        return this.listen('companyProfile.numberOfRecordShareholders', this.stock.companyProfile.numberOfRecordShareholders, true);
      },
      numberOfRecordShareholdersDate(){
        if(!this.stock.companyProfile) return null;
        return this.listen('companyProfile.numberOfRecordShareholdersDate', this.dateConvert(this.stock.companyProfile.numberOfRecordShareholdersDate), true);
      },
    },
      methods: {
          security_authorizedShares(security,index){
              if(!security) return null;
              return this.listen(`companyProfile.securities.${index}.authorizedShares`, this.numberFormat(security.authorizedShares));
          },
          security_authorizedSharesAsOfDate(security,index){
              if(!security) return null;
              return this.listen(`companyProfile.securities.${index}.authorizedSharesAsOfDate`, this.dateConvert(security.authorizedSharesAsOfDate));
          },
          security_outstandingShares(security,index){
              if(!security) return null;
              return this.listen(`companyProfile.securities.${index}.outstandingShares`, this.numberFormat(security.outstandingShares));
          },
          security_outstandingSharesAsOfDate(security,index){
              if(!security) return null;
              return this.listen(`companyProfile.securities.${index}.outstandingSharesAsOfDate`, this.dateConvert(security.outstandingSharesAsOfDate));
          },
          security_restrictedShares(security,index){
              if(!security) return null;
              return this.listen(`companyProfile.securities.${index}.restrictedShares`, this.numberFormat(security.restrictedShares));
          },
          security_restrictedSharesAsOfDate(security,index){
              if(!security) return null;
              return this.listen(`companyProfile.securities.${index}.restrictedSharesAsOfDate`, this.dateConvert(security.restrictedSharesAsOfDate));
          },
          security_unrestrictedShares(security,index){
              if(!security) return null;
              return this.listen(`companyProfile.securities.${index}.unrestrictedShares`, this.numberFormat(security.unrestrictedShares));
          },
          security_unrestrictedSharesAsOfDate(security,index)
          {
              if(!security) return null;
              return this.listen(`companyProfile.securities.${index}.unrestrictedSharesAsOfDate`, this.dateConvert(security.unrestrictedSharesAsOfDate));
          },
          security_dtcShares(security,index){
              if(!security) return null;
              return this.listen(`companyProfile.securities.${index}.dtcShares`, this.numberFormat(security.dtcShares));
          },
          security_dtcSharesAsOfDate(security,index) {
              if(!security) return null;
              return this.listen(`companyProfile.securities.${index}.dtcSharesAsOfDate`, this.dateConvert(security.dtcSharesAsOfDate));
          },
          security_publicFloat(security,index){
              if(!security) return null;
              return this.listen(`companyProfile.securities.${index}.publicFloat`, this.numberFormat(security.publicFloat));
          },
          security_publicFloatAsOfDate(security,index) {
              if(!security) return null;
              return this.listen(`companyProfile.securities.${index}.publicFloatAsOfDate`, this.dateConvert(security.publicFloatAsOfDate));
          },
          security_parValue(security,index) {
              if(!security) return null;
              return this.listen(`companyProfile.securities.${index}.parValue`, security.parValue);
          },
          security_transferAgents_id(transfer,security_index,transfer_index){
              if(!transfer) return null;
              return this.listen(`companyProfile.securities.${security_index}.transferAgents.${transfer_index}.id`, transfer.id, true);
          },
          security_transferAgents_name(transfer,security_index,transfer_index){
              if(!transfer) return null;
              return this.listen(`companyProfile.securities.${security_index}.transferAgents.${transfer_index}.name`, transfer.name);
          },
          action_actionType(action,index){
              if(!action) return null;
              return this.listen(`companyProfile.corporateActions.${index}.actionType`, action.actionType);
          },
          action_symbol(action,index){
              if(!action) return null;
              return this.listen(`companyProfile.corporateActions.${index}.symbol`, action.symbol);
          },
          action_changeDate(action,index){
              if(!action) return null;
              return this.listen(`companyProfile.corporateActions.${index}.changeDate`, this.dateConvert(action.changeDate));
          },
          action_comments(action,index){
              if(!action) return null;
              return this.listen(`companyProfile.corporateActions.${index}.comments`, action.comments);
          },
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
