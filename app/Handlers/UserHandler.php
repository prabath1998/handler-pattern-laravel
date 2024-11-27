<?php

namespace App\Handlers;

use App\Services\UserService;

class UserHandler
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function handleCreateUser(array $data)
    {
        try {
            return $this->userService->createUser($data);
        } catch (\Exception $e) {
            info(`error when creating user - {$e->getMessage()}`);
            return null;
        }
    }

    public function handleGetUser(int $id)
    {
        try {
            return $this->userService->getUserById($id);
        } catch (\Exception $e) {
            info(`error when fetching user - {$e->getMessage()}`);
            return null;
        }
    }
}
