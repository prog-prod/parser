<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CorrectedIsOtcAndSecurityIdColumnTypesInStockVerviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_overviews', function (Blueprint $table) {
            $table->boolean("isOtc")->nullable()->change();
            $table->bigInteger("securityId")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_overviews', function (Blueprint $table) {
            $table->boolean("isOtc")->change();
            $table->bigInteger("securityId")->change();
        });
    }
}
