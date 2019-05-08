<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            // (|:
            $table->bigIncrements('id');
            $table->bigInteger('post_id')->unsigned(); // ]: Id de articulo
            $table->bigInteger('tag_id')->unsigned(); // ]: Id de etiqueta
            $table->timestamps();

            // \~> Relaciones
            // ]: Llave foranea tabla usuarios
            $table->foreign('post_id')->references('id')->on('posts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            // ]: Llave foranea tabla categorias
            $table->foreign('tag_id')->references('id')->on('tags')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            // ]>~
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
