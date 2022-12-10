<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function welcome()
    {
        return response()->json([
            'message' => 'Hi there :)'
        ]);
    }
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('username', 'password'))) {
            return response()->json([
                'status' => false,
                'message' => 'Username atau password salah'
            ]);
        }

        $user = User::join('tb_level', 'tb_level.id', '=', 'users.id_level')
            ->selectRaw('users.*, tb_level.level')
            ->where('username', $request['username'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Berhasil Login',
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil logout',
        ]);
    }

    public function ubah_password(Request $request)
    {
        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil Ubah Password',
        ]);
    }
}
