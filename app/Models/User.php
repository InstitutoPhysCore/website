<?php

namespace App\Models;

use App\Models\Concerns\ProtectsOnDelete;
use App\Models\Equipe\Membro;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, ProtectsOnDelete;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_url',
        'is_admin',
    ];

    // Membros da equipe mantêm o cadastro quando a conta é excluída
    protected array $nullifyOnDelete = ['membros'];

    // Somente administradores acessam o painel
    public function canAccessPanel(Panel $panel): bool
    {
        return (bool) $this->is_admin;
    }

    // Nunca excluir o último administrador
    protected function extraDeleteBlockers(): array
    {
        return $this->is_admin && static::where('is_admin', true)->count() <= 1
            ? ['Este é o último administrador do site.']
            : [];
    }

    public function membros(): HasMany
    {
        return $this->hasMany(Membro::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }
}
