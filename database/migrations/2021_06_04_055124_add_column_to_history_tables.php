<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToHistoryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('stock_overviews_history', function (Blueprint $table) {
//            $table->foreignIdFor(\App\Models\StocksHistory::class)->unsigned()->after('id');
//        });
//        Schema::table('stock_company_profile_histories', function (Blueprint $table) {
//            $table->foreignIdFor(\App\Models\StocksHistory::class)->unsigned()->after('id');
//        });
//        Schema::table('stock_corporate_action_histories', function (Blueprint $table) {
//            $table->foreignIdFor(\App\Models\StocksHistory::class)->unsigned()->after('id');
//        });
//        Schema::table('stock_news_histories', function (Blueprint $table) {
//            $table->foreignIdFor(\App\Models\StocksHistory::class)->unsigned()->after('id');
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
//            $table->dropForeign('stock_overviews_history_stock_history_id_foreign');
//        });
//        Schema::table('stock_corporate_action_histories', function (Blueprint $table) {
//            $table->dropForeign('stock_corporate_action_histories_stock_history_id_foreign');
//        });
//        Schema::table('stock_company_profiles', function (Blueprint $table) {
//            $table->dropForeign('stock_company_profiles_stock_history_id_foreign');
//        });
//        Schema::table('stock_news_histories', function (Blueprint $table) {
//            $table->dropForeign('stock_news_histories_stock_history_id_foreign');
//        });


//        Schema::dropColumns('stock_overviews_history',['stocks_history_id']);
//        Schema::dropColumns('stock_company_profile_histories',['stocks_history_id']);
//        Schema::dropColumns('stock_corporate_action_histories',['stocks_history_id']);
//        Schema::dropColumns('stock_news_histories',['stocks_history_id']);

    }
}
