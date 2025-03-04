<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produtos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); // Cria um campo id (autoincrement, inteiro e primary key)
            $table->string('nome'); // campo nome do tipo string
            $table->text('descricao'); // campo descricao do tipo text
            $table->double('preco', 10, 2); // campo preco do tipo double com 2 casas decimais
            $table->string('slug'); // campo slub do tipo string
            $table->string('imagem')->nullable(); // campo imagem para armazenar o path de uma imagem (pode ser nulo)

            $table->unsignedBigInteger('id_user'); // campo que vai armazenar o valor da FK usuário
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); // Cria o relacionamento da FK dizendo onde tá referenciando e qual tipo de relacionamento, neste caso 'cascade'
            
            $table->unsignedBigInteger('id_categoria'); // campo que vai armazenar o valor da FK categoria
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade')->OnUpdate('cascade');

            $table->timestamps(); // cria dois campos: created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
