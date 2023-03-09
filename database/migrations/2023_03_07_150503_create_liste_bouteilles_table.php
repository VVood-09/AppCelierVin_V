<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeBouteillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liste_bouteilles', function (Blueprint $table) {
            // $table->id();
            // $table->foreignId('bouteille_id')->constrained('bouteilles');
            // $table->foreignId('cellier_id')->constrained('celliers');
            
            $table->unsignedBigInteger('bouteille_id');
            $table->unsignedBigInteger('cellier_id');
            $table->primary(['bouteille_id', 'cellier_id']);
            $table->foreign('bouteille_id')->references('id')->on('bouteilles');
            $table->foreign('cellier_id')->references('id')->on('celliers');
            $table->integer('qte')->nullable();
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
        Schema::dropIfExists('liste_bouteilles');
    }
}
