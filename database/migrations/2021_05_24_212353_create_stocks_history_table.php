<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks_history', function (Blueprint $table) {
            $table->id();
            
            $table->integer("securityId")->nullable();
            $table->text("reportDate")->nullable();
            $table->text("symbol")->nullable();
            $table->text("securityName")->nullable();
            $table->text("market")->nullable();
            $table->integer("marketId")->nullable();
            $table->text("securityType")->nullable();
            $table->text("country")->nullable();
            $table->text("state")->nullable();
            $table->text("forexCountry")->nullable();
            $table->boolean("caveatEmptor")->nullable();
            $table->integer("industryId")->nullable();
            $table->text("industry")->nullable();
            $table->text("volume")->nullable();
            $table->text("volumeChange")->nullable();
            $table->text("dividendYield")->nullable();
            $table->boolean("dividendPayer")->nullable();
            $table->text("morningStarRating")->nullable();
            $table->boolean("penny")->nullable();
            $table->float("price")->nullable();
            $table->text("shortInterest")->nullable(); // out of range ловлю
            $table->text("shortInterestPercent")->nullable(); // out of range ловлю
            $table->text("shortInterestRatio")->nullable(); // out of range ловлю
            $table->text("pct1Day")->nullable();
            $table->text("pct5Day")->nullable();
            $table->text("pct4Weeks")->nullable();
            $table->text("pct13Weeks")->nullable();
            $table->text("pct52Weeks")->nullable();
            $table->text("isBank")->nullable();
            $table->text("perfQxComp4Weeks")->nullable();
            $table->text("perfQxComp13Weeks")->nullable();
            $table->text("perfQxComp52Weeks")->nullable();
            $table->text("perfQxBillion4Weeks")->nullable();
            $table->text("perfQxBillion13Weeks")->nullable();
            $table->text("perfQxBillion52Weeks")->nullable();
            $table->text("perfQxBanks4Weeks")->nullable();
            $table->text("perfQxBanks13Weeks")->nullable();
            $table->text("perfQxBanks52Weeks")->nullable();
            $table->text("perfQxIntl4Weeks")->nullable();
            $table->text("perfQxIntl13Weeks")->nullable();
            $table->text("perfQxIntl52Weeks")->nullable();
            $table->text("perfQxUs4Weeks")->nullable();
            $table->text("perfQxUs13Weeks")->nullable();
            $table->text("perfQxUs52Weeks")->nullable();
            $table->text("perfQb4Weeks")->nullable();
            $table->text("perfQb13Weeks")->nullable();
            $table->text("perfQb52Weeks")->nullable();
            $table->text("perfSp4Weeks")->nullable();
            $table->text("perfSp13Weeks")->nullable();
            $table->text("perfSp52Weeks")->nullable();
            $table->text("perfQxDiv4Weeks")->nullable();
            $table->text("perfQxDiv13Weeks")->nullable();
            $table->text("perfQxDiv52Weeks")->nullable();
            $table->text("perfQxCan4Weeks")->nullable();
            $table->text("perfQxCan13Weeks")->nullable();
            $table->text("perfQxCan52Weeks")->nullable();

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
        Schema::dropIfExists('stocks_history');
    }
}
