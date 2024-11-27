<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\QueryException;

class UserService
{
    public function createUser(array $data)
    {
        try {
            $user = User::create($data);
            return $user;
        } catch (QueryException $e) {
            info(`database error when creating user - {$e->getMessage()}`);
            return null;
        }
    }

    public function getUserById(int $id)
    {
        try {
            return User::findOrFail($id);
        } catch (QueryException $e) {
            info(`database error when getting user - {$e->getMessage()}`);
            return null;
        }
    }

}
