<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserPolicy extends AdminPolicy
{
    // Ninguém exclui a própria conta pelo painel
    public function delete(User $user, Model $record): bool
    {
        return $user->is_admin && $user->isNot($record);
    }
}
