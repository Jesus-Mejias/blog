<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            // (\:
            $table->bigInteger('user_id')->unsigned(); // ]: Id de usuario
            $table->bigInteger('category_id')->unsigned(); // ]: Id de categoria
            $table->string('name', 128); // ]: Nombre de articulo
            $table->string('slug', 128)->unique(); // ]: Campo para URL amigable
            $table->mediumText('excerp')->nullable(); // ]: Extracto de articulo
            $table->text('body'); // ]: Cuerpo del articulo
            // ]: Estado del articulo
            $table->enum('status', ['PUBLISHED', 'DRAFT'])->default('DRAFT'); 
            $table->string('file', 128)->nullable(); // ]: Imagen del post
            $table->timestamps();

            // \~> Relaciones
            // ]: Llave foranea tabla usuarios
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            // ]: Llave foranea tabla categorias
            $table->foreign('category_id')->references('id')->on('categories')
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
        Schema::dropIfExists('posts');
    }
}
