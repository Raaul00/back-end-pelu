<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

abstract class Controller
{
    public function checkUserAuth($email)
    {
        $user = User::where('email', $email)->first();
        if ($user && Auth::check()) {
            return true; // Usuari ja autenticat
        }
        return false; // No autenticat
    }


    public function responseMessage($status, $message, $data = null, $httpCode)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $httpCode);
    }
}
