<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->integer('note');
            
            // $table->id();
            // $table->foreignId('bouteille_id')->constrained('bouteilles');
            // $table->foreignId('user_id')->constrained('users');
            
            $table->unsignedBigInteger('bouteille_id');
            $table->unsignedBigInteger('user_id');
            $table->primary(['bouteille_id', 'user_id']);
            $table->foreign('bouteille_id')->references('id')->on('bouteilles');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('notes');
    }
}
