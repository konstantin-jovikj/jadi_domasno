<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cook_id')->unsigned();
            $table->bigInteger('spiciness_id')->unsigned()->nullable();
            $table->string('dish_name');
            $table->string('dish_img')->nullable();
            $table->string('hashtag')->nullable();
            $table->string('ingredients');
            $table->string('description');
            $table->string('prep_time');
            $table->string('heating_instructions');
            $table->string('portion_size')->nullable();
            $table->float('price');
            $table->float('promo_price')->nullable();
            $table->dateTime('promo_price_date')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('cook_id')->references('id')->on('cooks')->onDelete('cascade');
            $table->foreign('spiciness_id')->references('id')->on('spicies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
