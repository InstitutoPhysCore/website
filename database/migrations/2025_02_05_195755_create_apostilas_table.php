<?php

use App\Models\Apostila\Serie;
use App\Models\Apostila\Categoria;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apostilas', function (Blueprint $table) {
            $table->id();

            // Título e descrição
            $table->string('title');
            $table->string('desc');

            // Colunas para determinação do autor do recurso através da AuthorTrait
            $table->integer('author_type');
            $table->foreignId('author_id');

            // ID da serie e volume do livro
            $table->foreignIdFor(Serie::class)->nullable();
            $table->integer('volume')->nullable();

            // Conteúdo do curso
            $table->string('attachment');

            $table->timestamps();
        });

        Schema::create('apostila_series', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('desc');

            // ID da Categoria da série
            $table->foreignIdFor(Categoria::class)->nullable();

            $table->timestamps();
        });

        Schema::create('apostila_categorias', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('desc');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apostilas');
        Schema::dropIfExists('apostila_series');
        Schema::dropIfExists('apostila_materias');
    }
};
