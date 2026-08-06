<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Users\CreateUserRequest;
use App\Services\UserService;

class UsersController extends Controller
{
    public function __construct(protected UserService $userService)
    {
        //
    }

    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $items = $this->userService->listUsers($request->input('keyword'))->appends($request->all());

        return view('users.index', ['items' => $items]);
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $this->authorize('create', \App\Models\User::class);

        return view('users.create');
    }

    public function store(CreateUserRequest $request)
    {
        try {
            $this->userService->registerUser($request->validated());
            return redirect()->route('users.index')->with('success', 'Add new User successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $this->authorize('create', \App\Models\User::class);

        $user = $this->userService->findUser($id);
        return view('users.edit', ['item' => $user]);
    }

    public function update(Request $request, string $id)
    {
        try {
            $this->userService->updateUser($id, $request->all());
            return redirect()->route('users.index')->with('success', 'User update successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy(string $id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('users.index')->with('success', 'User delete successfully!');
    }
}