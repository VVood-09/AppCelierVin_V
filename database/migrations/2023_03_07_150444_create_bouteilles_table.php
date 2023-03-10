<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBouteillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bouteilles', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 200);
            $table->string('image', 200)->nullable();
            $table->string('code_saq', 50)->nullable();
            $table->string('pays', 100)->nullable();
            $table->string('description', 200)->nullable();
            $table->float('prix')->nullable();
            $table->string('url_saq', 200)->nullable();
            $table->string('format', 20)->nullable();
            $table->string('type', 50)->nullable();
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
        Schema::dropIfExists('bouteilles');
    }
}
