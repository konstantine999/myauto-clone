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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('manufacturer_id');
            $table->foreignId('model_id');
            $table->foreignId('category_id');
            $table->foreignId('transmission_id');
            $table->foreignId('fuel_type');
            $table->foreignId('color_id');
            $table->foreignId('interior_material');
//            $table->foreignId('interior_color');
//            $table->foreignId('city_id');
//            $table->foreignId('currency');
            $table->decimal('engine_size');
            $table->unsignedInteger('cylinder_count');
            $table->unsignedInteger('airbag_count');
            $table->boolean('is_turbo');
            $table->unsignedInteger('mileage');
            $table->string('mileage_dimension');
            $table->string('steering_wheel_position');
            $table->string('drive');
            $table->unsignedInteger('door_count');
            $table->boolean('have_cats');
            $table->integer('manufacture_year');
            $table->boolean('is_duty_paid');
            $table->boolean('is_inspection_passed');
            $table->unsignedInteger('price');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
