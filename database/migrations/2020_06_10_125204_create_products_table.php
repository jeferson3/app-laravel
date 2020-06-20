<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //cria a tabela no banco
    public function up()
    {
        //função de criar
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id'); //id
            $table->string('name')->unique();
            $table->double('price', 10, 2);
            $table->string('image')->nullable();
            $table->text('description');
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
