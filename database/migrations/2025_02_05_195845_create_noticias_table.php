<?php

use App\Models\Equipe;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('desc');

            // URL da Imagem da Capa
            $table->string('cover_url')->nullable();
            
            // Colunas para determinação do autor do recurso através da AuthorTrait
            $table->integer('author_type');
            $table->foreignId('author_id');

            // Definir a prioridade das noticias
            $table->integer('priority');

            $table->longText('content');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
