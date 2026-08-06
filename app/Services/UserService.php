<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function __construct(protected UserRepository $userRepository)
    {
        //
    }

    public function listUsers(?string $keyword)
    {
        return $this->userRepository->paginateWithSearch($keyword);
    }

    public function findUser(string $id)
    {
        return $this->userRepository->find($id);
    }

    /**
     * Create a user, wrapped in a transaction, then fire the registration event.
     */
    public function registerUser(array $data)
    {
        DB::beginTransaction();
        try {
            $user = $this->userRepository->create($data);
            DB::commit();

            event(new UserRegistered($user));

            return $user;
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function updateUser(string $id, array $data)
    {
        DB::beginTransaction();
        try {
            $user = $this->userRepository->findOrFail($id);
            $user = $this->userRepository->update($user, $data);
            DB::commit();

            return $user;
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function deleteUser(string $id): void
    {
        $user = $this->userRepository->findOrFail($id);
        $this->userRepository->delete($user);
    }
}