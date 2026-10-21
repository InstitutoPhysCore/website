<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/*
Política única de gerenciamento de conteúdo: somente administradores podem
listar, ver, criar, editar e excluir. O Filament consulta estas regras em
cada ação (inclusive requisições Livewire diretas), não só na interface.
*/
class AdminPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->is_admin;
    }

    public function view(User $user, Model $record): bool
    {
        return $user->is_admin;
    }

    public function create(User $user): bool
    {
        return $user->is_admin;
    }

    public function update(User $user, Model $record): bool
    {
        return $user->is_admin;
    }

    public function delete(User $user, Model $record): bool
    {
        return $user->is_admin;
    }

    public function deleteAny(User $user): bool
    {
        return $user->is_admin;
    }

    public function restore(User $user, Model $record): bool
    {
        return $user->is_admin;
    }

    public function forceDelete(User $user, Model $record): bool
    {
        return $user->is_admin;
    }
}
