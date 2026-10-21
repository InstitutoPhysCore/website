<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    protected $signature = 'physcore:admin {email : E-mail do usuário} {--revoke : Remove o acesso de administrador}';

    protected $description = 'Concede (ou revoga) o acesso de administrador ao painel';

    public function handle(): int
    {
        $user = User::where('email', $this->argument('email'))->first();

        if (! $user) {
            $this->error('Usuário não encontrado.');

            return self::FAILURE;
        }

        $user->forceFill(['is_admin' => ! $this->option('revoke')])->save();

        $this->info($user->is_admin ? "{$user->email} agora é administrador." : "{$user->email} não é mais administrador.");

        return self::SUCCESS;
    }
}
