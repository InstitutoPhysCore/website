<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Controle de acesso ao painel: apenas administradores entram no Filament.
        if (! Schema::hasColumn('users', 'is_admin')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('is_admin')->default(false)->after('password');
            });

            // Preserva o acesso do criador do site: o usuário mais antigo passa a ser admin.
            $first = DB::table('users')->orderBy('id')->value('id');
            if ($first) {
                DB::table('users')->where('id', $first)->update(['is_admin' => true]);
            }
        }

        // Artigos passam a poder ser categorizados (a relação já existia no model, mas não a coluna).
        if (! Schema::hasColumn('artigos', 'categoria_id')) {
            Schema::table('artigos', function (Blueprint $table) {
                $table->unsignedBigInteger('categoria_id')->nullable()->after('author_id');
            });
        }

        // Membros podem existir sem conta de usuário e sem o texto "sobre".
        Schema::table('membros', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->longText('about')->nullable()->change();
        });

        // A coluna "diretor" colidia com a relação de mesmo nome (o atributo escondia a relação).
        if (Schema::hasColumn('secretarias', 'diretor') && ! Schema::hasColumn('secretarias', 'diretor_id')) {
            Schema::table('secretarias', function (Blueprint $table) {
                $table->renameColumn('diretor', 'diretor_id');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('secretarias', 'diretor_id')) {
            Schema::table('secretarias', function (Blueprint $table) {
                $table->renameColumn('diretor_id', 'diretor');
            });
        }

        if (Schema::hasColumn('artigos', 'categoria_id')) {
            Schema::table('artigos', function (Blueprint $table) {
                $table->dropColumn('categoria_id');
            });
        }

        if (Schema::hasColumn('users', 'is_admin')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('is_admin');
            });
        }
    }
};
