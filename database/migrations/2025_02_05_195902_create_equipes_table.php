<?php

use App\Models\Secretaria;
use App\Models\User;
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
        Schema::create('equipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Secretaria::class);
            $table->foreignIdFor(User::class);
            $table->string('function');
            $table->mediumText('bio');
            $table->longText('about');
            $table->json('socialmedia');
            $table->json('badges');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipes');
    }
};
