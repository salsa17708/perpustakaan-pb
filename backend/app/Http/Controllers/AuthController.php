<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validasi Input (Sesuai Flowmap: Input Username & Password)
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // 2. Cek Credentials (Username & Password)
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // 3. Jika Validasi Login True 
            $user = Auth::user();
            
            // Buat Token Sederhana (Sanctum) agar Frontend bisa mengenali user
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Login Berhasil',
                'data' => [
                    'user' => $user,
                    'token' => $token,
                    'role' => $user->role, // Penting untuk redirect di Frontend (Admin vs Siswa)
                ]
            ], 200);
        }

        // 4. Jika Validasi Login False 
        return response()->json([
            'status' => false,
            'message' => 'Username atau Password salah',
        ], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logout Berhasil']);
    }
}