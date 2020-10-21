<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AuthRepository;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->repository = new AuthRepository;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        return $this->repository->login($request);
    }

    public function logout()
    {
        return $this->repository->logout();
    }
}
