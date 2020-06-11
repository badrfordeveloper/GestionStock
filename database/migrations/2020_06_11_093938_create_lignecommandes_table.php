<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLignecommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignecommandes', function (Blueprint $table) {
            $table->id(); 
            $table->timestamps();
            $table->integer('produit_id')->unsigned();
            $table->integer('commande_id')->unsigned();
            $table->float('quantite')->nullable();
            $table->float('prix_unite')->nullable();
            $table->foreignId('produit_id')->constrained('produits')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('commande_id')->constrained('commandes')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lignecommandes');
    }
}
