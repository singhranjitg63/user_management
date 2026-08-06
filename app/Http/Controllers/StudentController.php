<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\AppController;
use App\Models\User;
use Exception;

class StudentController extends AppController
{
    public function list()
    {
        try {

            $isAuthenticated = true;

            if (!$isAuthenticated) {
                return $this->unauthenticated();
            }

            $users = User::all();

            return $this->sendResponse(
                $users,
                'Users fetched successfully',
                200
            );

        } catch (Exception $e) {

            return $this->sendError(
                $e->getMessage(),
                500
            );

        }
    }
}