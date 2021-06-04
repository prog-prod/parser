<?php

namespace App\Models;

use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockCompanyProfileHistory extends Model
{
    use HasFactory;
    public $timestamps = true;
    use BaseTrait;

    protected $fillable = [
        'stock_id',
        'auditors',
        'indexStatuses',
        'investmentBanks',
        'investorRelationFirms',
        'notes',
        'legalCounsels',
        'officers',
        'otcAward',
        'otherSecurities',
        'premierDirectorList',
        'standardDirectorList',
        'securities',
        'symbol',
        'address1',
        'address2',
        'auditStatus',
        'auditedStatusDisplay',
        'cik',
        'city',
        'companyLogoUrl',
        'corporateBrokers',
        'country',
        'countryId',
        'countryOfIncorporation',
        'countryOfIncorporationName',
        'edgarFilingStatus',
        'edgarFilingStatusId',
        'email',
        'fax',
        'filingCycle',
        'fiscalYearEnd',
        'latestFilingType',
        'latestFilingUrl',
        'name',
        'phone',
        'primarySicCode',
        'profileVerifiedAsOfDate',
        'reportingStandard',
        'reportingStandardMin',
        'state',
        'stateOfIncorporation',
        'stateOfIncorporationName',
        'tierCode',
        'tierGroup',
        'venue',
        'website',
        'yearOfIncorporation',
        'zip',
        'businessDesc',
        'audited',
        'blankCheck',
        'blindPool',
        'deregistered',
        'hasLatestFiling',
        'hasLogo',
        'is12g32b',
        'isAlternativeReporting',
        'isBankThrift',
        'isBankrupt',
        'isCaveatEmptor',
        'isDark',
        'isInternationalReporting',
        'isNonBankRegulated',
        'isOtherReporting',
        'isProfileVerified',
        'isShell',
        'isUnsolicited',
        'spac',
        'unableToContact',
        'deregistrationDate',
        'estimatedMarketCapAsOfDate',
        'latestFilingDate',
        'numberOfRecordShareholdersDate',
        'tierStartDate',
        'restrictedSharesAsOfDate',
        'unrestrictedSharesAsOfDate',
        'estimatedMarketCap',
        'numberOfEmployees',
        'numberOfEmployeesAsOf',
        'numberOfRecordShareholders',
        'restrictedShares',
        'unrestrictedShares',
    ];

    protected $casts = [
        'estimatedMarketCap' => 'float',
        'auditors' => 'array',
        'indexStatuses' => 'array',
        'investmentBanks' => 'array',
        'investorRelationFirms' => 'array',
        'notes' => 'array',
        'legalCounsels' => 'array',
        'officers' => 'array',
        'otcAward' => 'array',
        'otherSecurities' => 'array',
        'premierDirectorList' => 'array',
        'standardDirectorList' => 'array',
        'securities' => 'array',
    ];

    public function stock()
    {
        return $this->belongsTo(StocksHistory::class);
    }

}
