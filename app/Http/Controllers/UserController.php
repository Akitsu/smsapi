<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\User as User;

class UserController extends BaseController
{
    public function createAccount(Request $request) {
        $user = new User;
        $user->username = $request->input('username');
        $user->password =  Hash::make($request->input('password'));
        $user->save();

        return new JsonResponse($user);
    }

    public function login(Request $request){
        $token = app('auth')->attempt($request->only('username', 'password'));

        return response()->json(compact('token'));
    }

    public function test(Request $request) {
        return $request->user();
    }
}


