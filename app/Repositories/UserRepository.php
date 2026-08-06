<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * Get a paginated, searchable list of users.
     */
    public function paginateWithSearch(?string $keyword, int $perPage = 6)
    {
        $query = User::query();

        if ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('email', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('role', 'LIKE', '%' . $keyword . '%');
        }

        return $query->orderBy('name', 'asc')->paginate($perPage);
    }

    public function find(string $id): ?User
    {
        return User::find($id);
    }

    public function findOrFail(string $id): User
    {
        return User::findOrFail($id);
    }

    public function create(array $data): User
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->phone = $data['phone'];
        $user->role = $data['role'];
        $user->save();

        return $user;
    }

    public function update(User $user, array $data): User
    {
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->role = $data['role'];
        $user->save();

        return $user;
    }

    public function delete(User $user): void
    {
        $user->delete();
    }
}