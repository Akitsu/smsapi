<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\User as User;

class UserController extends BaseController
{
    public function login(Request $request){
        $token = app('auth')->attempt($request->only('email', 'password'));

        return response()->json(compact('token'));
    }
}


