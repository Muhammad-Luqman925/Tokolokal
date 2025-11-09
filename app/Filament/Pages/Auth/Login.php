<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class Login extends \Filament\Pages\Auth\Login
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getIdentifierFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getRememberFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function getIdentifierFormComponent(): Component
    {
        return TextInput::make('identifier')
            ->label('Email atau Nomor Telepon')
            ->placeholder('Masukkan email atau nomor telepon')
            ->required()
            ->autofocus()
            ->autocomplete('username')
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        $identifier = Str::of((string) ($data['identifier'] ?? ''))->trim();

        if (! $identifier->isEmpty() && $identifier->contains('@')) {
            $field = 'email';
            $value = $identifier->lower();
        } else {
            $field = 'phone_number';
            $value = $identifier->replaceMatches('/[^0-9+]/', '');
        }

        return [
            $field => (string) $value,
            'password' => $data['password'] ?? null,
        ];
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.identifier' => __('filament-panels::pages/auth/login.messages.failed'),
        ]);
    }
}
