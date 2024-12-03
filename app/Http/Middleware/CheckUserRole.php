<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        dump('Checking  User role: ' . $role);
        // Assumindo um usuário já autenticado que poderia ser obtido via Request
        $user = ['id' => 123, 'name' => 'Luiz', 'role' => 'admin'];

        if ($user['role'] === 'admin') {
            return $next($request);
        }
        
        abort(404);
    }
}
