<?php

use App\Models\Equipe;
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
        Schema::create('artigos', function (Blueprint $table) {
            $table->id();
            
            // Título e descrição do artigo
            $table->string('title');                        
            $table->string('desc');

            // Colunas para determinação do autor do recurso através da AuthorTrait
            $table->integer('author_type');
            $table->foreignId('author_id');

            // Contéudo do artigo  
            $table->longText('content');

            $table->timestamps();
        });

        Schema::create('artigo_categorias', function (Blueprint $table) {
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
        Schema::dropIfExists('artigos');
        Schema::dropIfExists('artigo_categorias');
    }
};
