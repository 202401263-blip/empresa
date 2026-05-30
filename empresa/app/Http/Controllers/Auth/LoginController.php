<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Services\AuditService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct(
        protected AuditService $audit
    ) {}

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string|max:120',
            'password' => 'required|string',
        ]);

        $usuario = Usuario::query()
            ->where(function ($q) use ($credentials) {
                $q->where('usuario', $credentials['login'])
                    ->orWhere('nombre_usuario', $credentials['login'])
                    ->orWhere('correo', $credentials['login']);
            })
            ->first();

        if (! $usuario || ! $usuario->estaActivo()) {
            throw ValidationException::withMessages([
                'login' => 'Credenciales incorrectas o usuario inactivo.',
            ]);
        }

        if (! $this->passwordMatches($credentials['password'], $usuario->getAuthPassword())) {
            throw ValidationException::withMessages([
                'login' => 'Credenciales incorrectas o usuario inactivo.',
            ]);
        }

        Auth::login($usuario, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    protected function passwordMatches(string $plain, string $stored): bool
    {
        if ($stored === '') {
            return false;
        }

        if (str_starts_with($stored, '$2y$') || str_starts_with($stored, '$2a$') || str_starts_with($stored, '$argon')) {
            return Hash::check($plain, $stored);
        }

        return hash_equals($stored, $plain);
    }
}
