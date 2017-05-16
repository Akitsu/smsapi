<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class TestController extends BaseController
{
    public function test(Request $request)
    {
        $number = $request->input('number');
        $message = $request->input('message');

        $output = shell_exec("gammu-smsd-inject TEXT " .$number . "-text" . $message);
        return $output;
    }
}
