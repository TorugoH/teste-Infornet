<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider as BaseEloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class CustomEloquentUserProvider extends BaseEloquentUserProvider
{
    /**
     * Validate a user against the given credentials.
     *
     * @param  UserContract  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        // Aqui você pode implementar sua própria lógica de validação de credenciais
        $plain = $credentials['senha'];

        return app('hash')->check($plain, $user->getAuthPassword());
    }
}
