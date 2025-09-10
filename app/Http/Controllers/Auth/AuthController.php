<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Traits\Response\ResponseTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Throwable;

class AuthController extends Controller
{
    use ResponseTrait;

    public function index(): View
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials)) {
                return $this->success('Login correcto');
            }

            return $this->error('Credenciales incorrectas');
        } catch (Throwable $e) {
            return $this->error('Error al intentar iniciar sesión');
        }
    }
}
