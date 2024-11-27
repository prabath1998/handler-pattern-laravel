<?php

namespace App\Http\Controllers;

use App\Handlers\UserHandler;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userHandler;

    public function __construct(UserHandler $userHandler)
    {
        $this->userHandler = $userHandler;
    }

    public function index(){
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $validated = $request->validated();
            $this->userHandler->handleCreateUser($validated);

            return redirect()->route('user.create')->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('user.create')->with('error', 'Something went wrong');
        }

    }

    public function show($id)
    {
        try {
            $this->userHandler->handleGetUser($id);

            return redirect()->route('user.show');
        } catch (\Exception $e) {
            info($e->getMessage());
            return redirect()->route('user.show')->with('error', 'Something went wrong');
        }

    }
}
