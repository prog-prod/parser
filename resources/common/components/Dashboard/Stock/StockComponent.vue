<template>
    <main-component>
        <h4 slot="breadcrumb-name" class="mb-0">Details of Stock #{{ stock.id }}</h4>
        <div slot="content" class="dashboard">
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
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified bg-light" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-bs-toggle="tab" href="#overview" role="tab" aria-selected="true">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Overview</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="#quote" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Quote</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="#company-profile" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block">Company Profile</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="#security-details" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">Security Details</span>
                            </a>
                        </li>
<!--                        <li class="nav-item waves-effect waves-light">-->
<!--                            <a class="nav-link" data-bs-toggle="tab" href="#news" role="tab" aria-selected="false">-->
<!--                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>-->
<!--                                <span class="d-none d-sm-block">News</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="nav-item waves-effect waves-light">-->
<!--                            <a class="nav-link" data-bs-toggle="tab" href="#financials" role="tab" aria-selected="false">-->
<!--                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>-->
<!--                                <span class="d-none d-sm-block">Financials</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="nav-item waves-effect waves-light">-->
<!--                            <a class="nav-link" data-bs-toggle="tab" href="#disclosure" role="tab" aria-selected="false">-->
<!--                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>-->
<!--                                <span class="d-none d-sm-block">Disclosure</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="nav-item waves-effect waves-light">-->
<!--                            <a class="nav-link" data-bs-toggle="tab" href="#research" role="tab" aria-selected="false">-->
<!--                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>-->
<!--                                <span class="d-none d-sm-block">Research</span>-->
<!--                            </a>-->
<!--                        </li>-->
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 pt-4 text-muted">
                        <div class="tab-pane active" id="overview" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="item justify-content-center position-relative text-center">
                                        <span>Open</span>
                                        <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.openingPrice }}</p>
                                        <p v-else class="fw-bold value">0</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item justify-content-center position-relative text-center">
                                        <span>Daily Range</span>
                                        <p v-if="stock.overview" class="fw-bold value">
                                            <span v-if="stock.overview.dailyLow">{{ stock.overview.dailyLow }}</span>
                                            <span v-if="stock.overview.dailyLow && stock.overview.dailyHigh">-</span>
                                            <span v-if="stock.overview.dailyHigh">{{ stock.overview.dailyHigh }}</span>
                                        </p>
                                        <p v-else class="fw-bold value">0</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item justify-content-center position-relative text-center">
                                        <span>Volume</span>
<!--                                        .volume-->
                                        <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.volumeFormatted }}</p>
                                        <p v-else class="fw-bold value">0</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item justify-content-center position-relative text-center">
                                        <span>Market Cap</span>
                                        <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.marketCap }}</p>
                                        <p v-else class="fw-bold value">0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="quote" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="item justify-content-center position-relative text-center">
                                        <span>Open</span>
                                        <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.openingPrice }}</p>
                                        <p v-else class="fw-bold value">0</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item justify-content-center position-relative text-center">
                                        <span>Daily Range</span>
                                        <p v-if="stock.overview" class="fw-bold value">
                                            <span v-if="stock.overview.dailyLow">{{ stock.overview.dailyLow }}</span>
                                            <span v-if="stock.overview.dailyLow && stock.overview.dailyHigh">-</span>
                                            <span v-if="stock.overview.dailyHigh">{{ stock.overview.dailyHigh }}</span>
                                        </p>
                                        <p v-else class="fw-bold value">0</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item justify-content-center position-relative text-center">
                                        <span>Volume</span>
                                        <!--                                        .volume-->
                                        <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.volumeFormatted }}</p>
                                        <p v-else class="fw-bold value">0</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item justify-content-center position-relative text-center">
                                        <span>Dividend</span>
                                        <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.dividend }}</p>
                                        <p v-else class="fw-bold value">0</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item justify-content-center position-relative text-center">
                                        <span>Prev Close</span>
                                        <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.previousClose }}</p>
                                        <p v-else class="fw-bold value">0</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item justify-content-center position-relative text-center">
                                        <span>52WK Range</span>
                                        <p v-if="stock.overview" class="fw-bold value">
                                            <span v-if="stock.overview.annualLow">{{ stock.overview.annualLow }}</span>
                                            <span v-if="stock.overview.annualLow && stock.overview.annualHigh">-</span>
                                            <span v-if="stock.overview.annualHigh">{{ stock.overview.annualHigh }}</span>
                                        </p>
                                        <p v-else class="fw-bold value">0</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item justify-content-center position-relative text-center">
                                        <span>Average Vol (30D)</span>
                                        <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.thirtyDaysAvgVol }}</p>
                                        <p v-else class="fw-bold value">0</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item justify-content-center position-relative text-center">
                                        <span>Net Dividend Yield</span>
                                        <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.yield }}</p>
                                        <p v-else class="fw-bold value">0</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item justify-content-center position-relative text-center">
                                        <span>Best Bid</span>
                                        <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.bidPrice }} x {{ stock.overview.bidSize }}</p>
                                        <p v-else class="fw-bold value">0</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item justify-content-center position-relative text-center">
                                        <span>Best Ask</span>
                                        <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.askPrice }} x {{ stock.overview.askSize }}</p>
                                        <p v-else class="fw-bold value">0</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item justify-content-center position-relative text-center">
                                        <span>Market Cap</span>
                                        <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.marketCap }}</p>
                                        <p v-else class="fw-bold value">0</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item justify-content-center position-relative text-center">
                                        <span>Shares Out</span>
                                        <p v-if="stock.overview" class="fw-bold value">{{ stock.overview.sharesOutstanding }}</p>
                                        <p v-else class="fw-bold value">0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <div class="tab-pane" id="news" role="tabpanel">
                            <p class="mb-0">
                                Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                art party before they sold out master cleanse gluten-free squid
                                scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                art party locavore wolf cliche high life echo park Austin. Cred
                                vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                farm-to-table.
                            </p>
                        </div>
                        <div class="tab-pane" id="financials" role="tabpanel">
                            <p class="mb-0">
                                Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                art party before they sold out master cleanse gluten-free squid
                                scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                art party locavore wolf cliche high life echo park Austin. Cred
                                vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                farm-to-table.
                            </p>
                        </div>
                        <div class="tab-pane" id="disclosure" role="tabpanel">
                            <p class="mb-0">
                                Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                art party before they sold out master cleanse gluten-free squid
                                scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                art party locavore wolf cliche high life echo park Austin. Cred
                                vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                farm-to-table.
                            </p>
                        </div>
                        <div class="tab-pane" id="research" role="tabpanel">
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
        </div>
    </main-component>
</template>

<script>
import StockService from '../../../shared/services/stock.service';

export default {
    data() {
        return {
            stock: {}
        }
    },
    created() {
        return this.loadStock()
    },
    methods: {
        loadStock: function() {
            StockService.show(this.$route.params.id).then((response) => {
                this.stock = response.stock;
            })
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
        }
    }
}
</script>


<style>
    .tab-pane .item .value {
        font-size: 18px;
        color: #333;
        border-bottom: 1px solid #d4d4d4;
    }
    .share-structure span {
        font-size: 16px;
        color: #333;
        margin-bottom: 10px;
        border-bottom: 1px solid #f2f2f2;
        padding-bottom: 5px;
    }
    .share-structure span.helper span {
        padding-left: 15px;
        font-size: 15px;
        color: #808080;
        border-bottom: unset;
    }
    table thead th {
        font-size: 14px;
        color: #333;
        margin-bottom: 10px;
        border-bottom: 1px solid #f2f2f2;
        padding-bottom: 5px;
    }
    table tbody td {
        padding: 15px 10px;
        border-bottom: 1px solid #f2f2f2;
    }
    ul {
        list-style-type: none;
        padding-left: 0;
        font-size: 16px;
    }
    .index {
        padding: 10px;
        border: 2px solid #4ebf32;
        font-weight: 500;
    }
    .index.not {
        border: 2px solid #f46a69;
    }
</style>
