<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->unsignedBigInteger('category_id');
            $table->float('price',10,2);
            $table->float('cost',10,2);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
        
        DB::statement("ALTER TABLE products ADD image LONGBLOB");
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
