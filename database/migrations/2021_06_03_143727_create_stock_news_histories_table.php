<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockNewsHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_news_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Stock::class);
            $table->foreignIdFor(\App\Models\StockNews::class);
            $table->integer("original_id");
            $table->integer("companyId");
            $table->integer("userId");
            $table->text("title");
            $table->longText("content")->nullable();
            $table->text("symbol")->nullable();
            $table->text("typeId");
            $table->text("statusId");
            $table->text("location")->nullable();
            $table->boolean("isImmediate");
            $table->text("createdDate");
            $table->text("lastModifiedDate");
            $table->text("releaseDate");
            $table->boolean("canDistribute");
            $table->boolean("wasDistributed");
            $table->text("newsTypeDescript");
            $table->text("statusDescript");
            $table->text("sourceId");
            $table->text("displayDateTime");
            $table->boolean("display");
            $table->boolean("isItemFromExternalProvider");
            $table->boolean("immediate");

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
        Schema::dropIfExists('stock_news_histories');
    }
}
