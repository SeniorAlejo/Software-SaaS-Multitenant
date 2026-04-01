<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre Completo')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('email')
                    ->label('Correo Electrónico')
                    ->email()
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('password')
                    ->label('Contraseña')
                    ->password()
                    // Exigimos contraseña solo si estamos creando un usuario nuevo
                    ->required(fn (string $context): bool => $context === 'create')
                    // Si el campo está vacío al editar, Filament no sobrescribe la clave actual
                    ->dehydrated(fn ($state) => filled($state))
                    ->maxLength(255),
                
                Select::make('roles')
                    ->label('Rol del Usuario')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable(),
            ]);
    }
}