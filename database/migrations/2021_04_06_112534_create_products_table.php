<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("UUID");
            $table->string('ad');
            $table->string('silindiMi');
            $table->timestamps();
           $table->foreign('id')->references('id')->on('stocks');
        });
      //  $products = DB::table('products')->leftJoin('stocks', 'products.id', '=', 'stocks.id')->get();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
