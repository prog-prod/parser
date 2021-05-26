<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_company_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Stock::class);

            $table->json('auditors')->nullable();
            $table->json('indexStatuses')->nullable();
            $table->json('investmentBanks')->nullable();
            $table->json('investorRelationFirms')->nullable();
            $table->json('notes')->nullable();
            $table->json('legalCounsels')->nullable();
            $table->json('officers')->nullable();
            $table->json('otcAward')->nullable();
            $table->json('otherSecurities')->nullable();
            $table->json('premierDirectorList')->nullable();
            $table->json('standardDirectorList')->nullable();
            $table->json('securities')->nullable();

            $table->string('symbol');

            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('auditStatus')->nullable();
            $table->string('auditedStatusDisplay')->nullable();
            $table->string('cik')->nullable();
            $table->string('city')->nullable();
            $table->string('companyLogoUrl')->nullable();
            $table->longText('corporateBrokers')->nullable();
            $table->string('country')->nullable();
            $table->string('countryId')->nullable();
            $table->string('countryOfIncorporation')->nullable();
            $table->string('countryOfIncorporationName')->nullable();
            $table->string('edgarFilingStatus')->nullable();
            $table->string('edgarFilingStatusId')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('filingCycle')->nullable();
            $table->string('fiscalYearEnd')->nullable();
            $table->string('latestFilingType')->nullable();
            $table->string('latestFilingUrl')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('primarySicCode')->nullable();
            $table->string('profileVerifiedAsOfDate')->nullable();
            $table->string('reportingStandard')->nullable();
            $table->string('reportingStandardMin')->nullable();
            $table->string('state')->nullable();
            $table->string('stateOfIncorporation')->nullable();
            $table->string('stateOfIncorporationName')->nullable();
            $table->string('tierCode')->nullable();
            $table->string('tierGroup')->nullable();
            $table->string('venue')->nullable();
            $table->string('website')->nullable();
            $table->string('yearOfIncorporation')->nullable();
            $table->string('zip')->nullable();
            $table->longText('businessDesc')->nullable();

            $table->boolean('audited')->nullable();
            $table->boolean('blankCheck')->nullable();
            $table->boolean('blindPool')->nullable();
            $table->boolean('deregistered')->nullable();
            $table->boolean('hasLatestFiling')->nullable();
            $table->boolean('hasLogo')->nullable();
            $table->boolean('is12g32b')->nullable();
            $table->boolean('isAlternativeReporting')->nullable();
            $table->boolean('isBankThrift')->nullable();
            $table->boolean('isBankrupt')->nullable();
            $table->boolean('isCaveatEmptor')->nullable();
            $table->boolean('isDark')->nullable();
            $table->boolean('isInternationalReporting')->nullable();
            $table->boolean('isNonBankRegulated')->nullable();
            $table->boolean('isOtherReporting')->nullable();
            $table->boolean('isProfileVerified')->nullable();
            $table->boolean('isShell')->nullable();
            $table->boolean('isUnsolicited')->nullable();
            $table->boolean('spac')->nullable();
            $table->boolean('unableToContact')->nullable();

            /** timestamps */
            $table->unsignedBigInteger('deregistrationDate')->nullable();
            $table->unsignedBigInteger('estimatedMarketCapAsOfDate')->nullable();
            $table->unsignedBigInteger('latestFilingDate')->nullable();
            $table->unsignedBigInteger('numberOfRecordShareholdersDate')->nullable();
            $table->unsignedBigInteger('tierStartDate')->nullable();
            $table->unsignedBigInteger('restrictedSharesAsOfDate')->nullable();
            $table->unsignedBigInteger('unrestrictedSharesAsOfDate')->nullable();

            $table->unsignedBigInteger('estimatedMarketCap')->nullable();
            $table->integer('numberOfEmployees')->nullable();
            $table->bigInteger('numberOfEmployeesAsOf')->nullable();
            $table->integer('numberOfRecordShareholders')->nullable();
            $table->bigInteger('restrictedShares')->nullable();
            $table->bigInteger('unrestrictedShares')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_company_profiles');
    }
}
