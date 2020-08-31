<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcceTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acce_type', function (Blueprint $table) {
            $table->id();
             $table->foreignId('acce_id')->constrained('acces')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('acce_type');
    }
}
