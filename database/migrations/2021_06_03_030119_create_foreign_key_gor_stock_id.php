<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeyGorStockId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('stock_overviews_history', function (Blueprint $table) {
//            $table->bigInteger('stock_overview_id')->unsigned()->after('id');
//            $table->bigInteger('stock_id')->unsigned()->after('stock_overview_id');
//        });
//        Schema::table('stock_overviews_history', function (Blueprint $table) {
//            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
//        });
//        Schema::table('stock_overviews_history', function (Blueprint $table) {
//            $table->foreign('stock_overview_id')->references('id')->on('stock_overviews')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('stock_overviews_history', function (Blueprint $table) {
//            $table->dropForeign('stock_overviews_history_stock_id_foreign');
//        });
//        Schema::dropColumns('stock_overviews_history',['stock_id','stock_overview_id']);
    }
}
