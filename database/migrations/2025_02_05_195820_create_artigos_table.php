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
            $table->id();                                   // 
            $table->string('title');                        // Título
            $table->string('desc');                         // Descrição
            $table->string('category');                     // Categoria
            $table->foreignIdFor(Equipe::class, 'author');  // Autor
            $table->longText('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artigos');
    }
};
