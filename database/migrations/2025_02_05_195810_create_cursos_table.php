<?php

use App\Models\Equipe;
use App\Models\Secretaria;
use App\Models\Curso\Serie;
use App\Models\Curso\Materia;
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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();

            // Título e descrição
            $table->string('title');
            $table->string('desc');

            // Colunas para determinação do autor do recurso através da AuthorTrait
            $table->integer('author_type');
            $table->foreignId('author_id');

            // ID da serie e episódio do curso
            $table->foreignIdFor(Serie::class)->nullable();
            $table->integer('episode')->nullable();

            // ID da materia do curso
            $table->foreignIdFor(Materia::class)->nullable();

            // Conteúdo do curso
            $table->string('attachment');

            $table->timestamps();
        });

        Schema::create('cursos_series', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('desc');

            $table->timestamps();
        });

        Schema::create('cursos_materias', function (Blueprint $table) {
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
        Schema::dropIfExists('cursos');
    }
};
