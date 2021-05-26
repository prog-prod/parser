<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockOverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_overviews', function (Blueprint $table) {
            $table->id();
            $table->integer('stock_id');
            $table->boolean("isOtc");
            $table->text("symbol");
            $table->integer("securityId");
            $table->text("lastSale")->nullable();
            $table->text("change")->nullable();
            $table->text("percentChange")->nullable();
            $table->text("tickCode")->nullable();
            $table->text("tickName")->nullable();
            $table->text("volume")->nullable();
            $table->text("volumeFormatted")->nullable();
            $table->text("lastTradeTime")->nullable();
            $table->text("quoteTime")->nullable();
            $table->text("quoteDateTime")->nullable();
            $table->text("insideTime")->nullable();
            $table->text("bidPrice")->nullable();
            $table->text("bidSize")->nullable();
            $table->text("askPrice")->nullable();
            $table->text("askSize")->nullable();
            $table->text("dailyHigh")->nullable();
            $table->text("dailyLow")->nullable();
            $table->text("openingPrice")->nullable();
            $table->text("annualHigh")->nullable();
            $table->text("annualLow")->nullable();
            $table->text("dividend")->nullable();
            $table->text("eps")->nullable();
            $table->text("previousClose")->nullable();
            $table->text("peRatio")->nullable();
            $table->text("yield")->nullable();
            $table->text("betaCoefficient")->nullable();
            $table->text("exchangeCode")->nullable();
            $table->text("exchangeName")->nullable();
            $table->text("delay")->nullable();
            $table->boolean("isADR")->nullable();
            $table->boolean("realtime")->nullable();
            $table->boolean("pinkLinkRealtime")->nullable();
            $table->text("thirtyDaysAvgVol")->nullable();
            $table->boolean("showRealtimeAd")->nullable();
            $table->text("marketCap")->nullable();
            $table->text("sharesOutstanding")->nullable();
            $table->boolean("adr")->nullable();
            $table->text("isProfileVerified")->nullable();
            $table->text("profileVerifiedAsOfDate")->nullable();
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
        Schema::dropIfExists('stock_overviews');
    }
}
