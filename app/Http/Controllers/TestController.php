<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class TestController extends BaseController
{
    public function test()
    {
        $output = shell_exec("gammu-smsd-inject TEXT 0646014672 -text \"All your base are belong to us\"");
        return $output;
    }
}
