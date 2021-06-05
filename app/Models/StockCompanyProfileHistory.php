<?php

namespace App\Models;

use App\Casts\ArrayCast;
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
        'auditors' => ArrayCast::class,
        'indexStatuses' => ArrayCast::class,
        'investmentBanks' => ArrayCast::class,
        'investorRelationFirms' => ArrayCast::class,
        'notes' => ArrayCast::class,
        'legalCounsels' => ArrayCast::class,
        'officers' => ArrayCast::class,
        'otcAward' => ArrayCast::class,
        'otherSecurities' => ArrayCast::class,
        'premierDirectorList' => ArrayCast::class,
        'standardDirectorList' => ArrayCast::class,
        'securities' => ArrayCast::class,
    ];

    public function stock()
    {
        return $this->belongsTo(StocksHistory::class);
    }

}
