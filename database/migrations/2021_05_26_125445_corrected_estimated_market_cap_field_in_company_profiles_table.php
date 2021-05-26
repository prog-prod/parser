<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CorrectedEstimatedMarketCapFieldInCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_company_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('estimatedMarketCap')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_company_profiles', function (Blueprint $table) {
            $table->unsignedFloat('estimatedMarketCap', 15, 5)->nullable();
        });
    }
}
