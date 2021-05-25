<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'nama_usaha'    => 'required|string',
            'kategori_usaha'   => 'required|string',
            'name'          => 'required|string',
            'nohp'          => 'required|string',
            'email'         => 'required|string|unique:users,email',
            'password'      => 'required|string'
        ]);

        $user = User::create([
            'nama_usaha'    => $data['nama_usaha'],
            'kategori_usaha'   => $data['kategori_usaha'],
            'name'          => $data['name'],
            'nohp'          => $data['nohp'],
            'email'         => $data['email'],
            'password'      => bcrypt($data['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email'         => 'required',
            'password'      => 'required'
        ]);

        $user = User::where('email', $data['email'])->first();
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'message'   => 'Email atau Password salah!'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'message' => 'Login Berhasil',
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        $response = [
            'message' => 'Anda telah logout'
        ];

        return response()->json($response, 200);
    }
}
