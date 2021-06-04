<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StockCompanyProfileHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'stock_id' => (int) $this->stock_id,

            /** JSON */
            'auditors' => (array) $this->auditors,
            'indexStatuses' => (array) $this->indexStatuses,
            'investmentBanks' => (array) $this->investmentBanks,
            'investorRelationFirms' => (array) $this->investorRelationFirms,
            'notes' => (array) $this->notes,
            'legalCounsels' => (array) $this->legalCounsels,
            'officers' => (array) $this->officers,
            'otcAward' => (array) $this->otcAward,
            'otherSecurities' => (array) $this->otherSecurities,
            'premierDirectorList' => (array) $this->premierDirectorList,
            'standardDirectorList' => (array) $this->standardDirectorList,
            'securities' => (array) $this->securities,

            /** string */
            'symbol' => (string) $this->symbol,

            'address1' => (string) $this->address1,
            'address2' => (string) $this->address2,
            'auditStatus' => (string) $this->auditStatus,
            'auditedStatusDisplay' => (string) $this->auditedStatusDisplay,
            'cik' => (string) $this->cik,
            'city' => (string) $this->city,
            'companyLogoUrl' => (string) $this->companyLogoUrl,
            'corporateBrokers' => (string) $this->corporateBrokers,
            'country' => (string) $this->country,
            'countryId' => (string) $this->countryId,
            'countryOfIncorporation' => (string) $this->countryOfIncorporation,
            'countryOfIncorporationName' => (string) $this->countryOfIncorporationName,
            'edgarFilingStatus' => (string) $this->edgarFilingStatus,
            'edgarFilingStatusId' => (string) $this->edgarFilingStatusId,
            'email' => (string) $this->email,
            'fax' => (string) $this->fax,
            'filingCycle' => (string) $this->filingCycle,
            'fiscalYearEnd' => (string) $this->fiscalYearEnd,
            'latestFilingType' => (string) $this->latestFilingType,
            'latestFilingUrl' => (string) $this->latestFilingUrl,
            'name' => (string) $this->name,
            'phone' => (string) $this->phone,
            'primarySicCode' => (string) $this->primarySicCode,
            'profileVerifiedAsOfDate' => (string) $this->profileVerifiedAsOfDate,
            'reportingStandard' => (string) $this->reportingStandard,
            'reportingStandardMin' => (string) $this->reportingStandardMin,
            'state' => (string) $this->state,
            'stateOfIncorporation' => (string) $this->stateOfIncorporation,
            'stateOfIncorporationName' => (string) $this->stateOfIncorporationName,
            'tierCode' => (string) $this->tierCode,
            'tierGroup' => (string) $this->tierGroup,
            'venue' => (string) $this->venue,
            'website' => (string) $this->website,
            'yearOfIncorporation' => (string) $this->yearOfIncorporation,
            'zip' => (string) $this->zip,
            'businessDesc' => (string) $this->businessDesc,

            /** boolean */
            'audited' => (bool) $this->audited,
            'blankCheck' => (bool) $this->blankCheck,
            'blindPool' => (bool) $this->blindPool,
            'deregistered' => (bool) $this->deregistered,
            'hasLatestFiling' => (bool) $this->hasLatestFiling,
            'hasLogo' => (bool) $this->hasLogo,
            'is12g32b' => (bool) $this->is12g32b,
            'isAlternativeReporting' => (bool) $this->isAlternativeReporting,
            'isBankThrift' => (bool) $this->isBankThrift,
            'isBankrupt' => (bool) $this->isBankrupt,
            'isCaveatEmptor' => (bool) $this->isCaveatEmptor,
            'isDark' => (bool) $this->isDark,
            'isInternationalReporting' => (bool) $this->isInternationalReporting,
            'isNonBankRegulated' => (bool) $this->isNonBankRegulated,
            'isOtherReporting' => (bool) $this->isOtherReporting,
            'isProfileVerified' => (bool) $this->isProfileVerified,
            'isShell' => (bool) $this->isShell,
            'isUnsolicited' => (bool) $this->isUnsolicited,
            'spac' => (bool) $this->spac,
            'unableToContact' => (bool) $this->unableToContact,

            /** Timestamp's */
            'deregistrationDate' => (int) $this->deregistrationDate,
            'estimatedMarketCapAsOfDate' => (int) $this->estimatedMarketCapAsOfDate,
            'latestFilingDate' => (int) $this->latestFilingDate,
            'numberOfRecordShareholdersDate' => (int) $this->numberOfRecordShareholdersDate,
            'tierStartDate' => (int) $this->tierStartDate,
            'restrictedSharesAsOfDate' => (int) $this->restrictedSharesAsOfDate,
            'unrestrictedSharesAsOfDate' => (int) $this->unrestrictedSharesAsOfDate,

            /** numerics */
            'estimatedMarketCap' => (float) $this->estimatedMarketCap,
            'numberOfEmployees' => (int) $this->numberOfEmployees,
            'numberOfEmployeesAsOf' => (int) $this->numberOfEmployeesAsOf,
            'numberOfRecordShareholders' => (int) $this->numberOfRecordShareholders,
            'restrictedShares' => (int) $this->numberOfRecordShareholders,
            'unrestrictedShares' => (int) $this->numberOfRecordShareholders,
        ];
    }
}
