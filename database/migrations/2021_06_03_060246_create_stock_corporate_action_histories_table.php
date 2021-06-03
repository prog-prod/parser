<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockCorporateActionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_corporate_action_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Stock::class);
            $table->foreignIdFor(\App\Models\StockCorporateAction::class);
            $table->bigInteger('changeDate');
            $table->longText('comments');
            $table->string('actionType');
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
        Schema::dropIfExists('stock_corporate_action_histories');
    }
}
