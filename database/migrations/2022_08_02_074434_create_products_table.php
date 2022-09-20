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
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('details')->nullable();
            $table->string('main_image');
            $table->string('images');
            $table->unSignedBigInteger("subcategory_id");
            $table->foreign("subcategory_id")->references("id")->on("sub_categories");
            $table->unSignedBigInteger("offer_id");
            $table->foreign("offer_id")->nullable()->references("id")->on("offers");
            $table->integer('regular_price');
            $table->integer('sale_price')->nullable();
            $table->boolean('active')->default(1);
            $table->unsignedInteger('quantity')->default(10);
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
