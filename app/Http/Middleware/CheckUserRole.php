<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié
        if (auth()->check()) {
            // Récupérer le statut de l'utilisateur
            $status = auth()->user()->status;

            // Ajouter le statut de l'utilisateur à la session pour pouvoir l'utiliser dans le layout
            session(['user_status' => $status]);
        }

        // Poursuivre normalement
        return $next($request);
    }
}