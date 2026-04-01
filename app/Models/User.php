<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser; // <-- Importación necesaria
use Filament\Panel; // <-- Importación necesaria
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements FilamentUser // <-- Implementamos el contrato
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * El candado de seguridad de Filament.
     * Solo permite la entrada al panel administrativo si el usuario es superadmin.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole('superadmin');
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}