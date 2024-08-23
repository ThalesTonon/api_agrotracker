<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'company_id' => 'required|exists:company,id',
            'role' => 'required|in:Super,Admin,Colaborador',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'company_id' => $validated['company_id'],
            'role' => $validated['role'],
        ]);


        if (!$user) {
            return response()->json(['message' => 'Erro ao criar usuário'], 500);
        }
        $messageBody = 'Seja bem-vindo ao ' . config('app.name') . ', ' . $user->name . '!';
        $details = [
            'title' => 'Mensagem de ' . config('app.name'),
            'body' => $messageBody,
        ];


        Mail::to($user->email)->send(new SendMail($details));
        return response()->json($user, 201);
    }
    // Função para fazer login
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if (!Auth::attempt($validated)) {
            return response()->json(['message' => 'Credenciais inválidas'], 400);
        }
        $user = User::where('email', $validated['email'])->firstOrFail();

        // Definindo a expiração do token manualmente
        $tokenResult = $user->createToken('auth_token');
        $token = $tokenResult->plainTextToken;
        $tokenResult->accessToken->expires_at = now()->addHours(2);
        $tokenResult->accessToken->save();
        $expires_at = $tokenResult->accessToken->expires_at->setTimezone('America/Sao_Paulo')->format('Y-m-d H:i:s');

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_at' => $expires_at,
            'user' => $user,
        ]);
    }
    // Função de Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logout com sucesso']);
    }
}
