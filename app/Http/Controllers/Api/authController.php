<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Auth\RequestGuard;
use App\Models\admin;

class authController extends Controller
{
    // LOGIN
    public function login(Request $req) {
        $validator = $req -> validate ([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $admin = admin::where('username', $validator['username']) -> first();
        
        if (!$admin || !($admin->password == $validator["password"])) {
            return response([
                'message' => "Username or Password can't be found",
            ], 400);
            
        } else {
            $token = $admin->createToken("secret") -> plainTextToken;
            return response([
                "message" => "Success to login",
                'token' => $token,
                'username' => $validator['username']
            ], 200);
        }
    }

    // LOGOUT
    public function logout(Request $req)
    {
        $req->user()->currentAccessToken()->delete();

        return response([
            "message"=>"Account has been logout"
        ], 200);
    }

    // CHECK TOKEN
    public function check_token()
    {
        return response([
            'username' => auth('sanctum')->user()->username,
            'is_valid' => (auth('sanctum')->check()?1:0)
        ]);
    }
}
