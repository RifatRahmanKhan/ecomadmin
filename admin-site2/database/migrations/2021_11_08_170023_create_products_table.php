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
            
                $table->increments('id');
                $table->string('title')->unique();
                $table->text('description')->nullable();
                $table->string('slug');
                $table->integer('price');
                $table->integer('offer_price')->default(0);
                $table->integer('quantity')->default(1);
                /*$table->integer('brand_id');*/
                $table->integer('category_id');
                $table->integer('status')->default(0);
                $table->integer('featured')->default(0)->comment('1 for Featured, 0 for normal mood');
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
        Schema::dropIfExists('products');
    }
}
