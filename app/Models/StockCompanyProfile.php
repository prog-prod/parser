<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockCompanyProfile extends Model
{
    use HasFactory;

    protected $table = 'stock_company_profiles';

    protected $fillable = [
        'stock_id',

        /** JSON */
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

        /** string */
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

        /** boolean */
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

        /** Timestamp's */
        'deregistrationDate',
        'estimatedMarketCapAsOfDate',
        'latestFilingDate',
        'numberOfRecordShareholdersDate',
        'tierStartDate',
        'restrictedSharesAsOfDate',
        'unrestrictedSharesAsOfDate',

        /** numerics */
        'estimatedMarketCap',
        'numberOfEmployees',
        'numberOfEmployeesAsOf',
        'numberOfRecordShareholders',
        'restrictedShares',
        'unrestrictedShares'
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
        return $this->belongsTo(Stock::class);
    }
}
