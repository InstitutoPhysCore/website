<?php

use App\Models\Software\Categoria;
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
        Schema::create('software', function (Blueprint $table) {
            $table->id();

            // Nome e descrição
            $table->string('name');
            $table->string('desc');

            // Colunas para determinação do autor do recurso através da AuthorTrait
            $table->integer('author_type');
            $table->foreignId('author_id');

            // ID da categoria do software
            $table->foreignIdFor(Categoria::class)->nullable();

            // Informações do repositório GitHub
            $table->string('owner');
            $table->string('repo');

            $table->timestamps();
        });

        Schema::create('software_categorias', function (Blueprint $table) {
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
        Schema::dropIfExists('software');
        Schema::dropIfExists('software_categorias');
    }
};
