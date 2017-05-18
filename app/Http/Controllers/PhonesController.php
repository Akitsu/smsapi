<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Phones as Phones;

class PhonesController extends BaseController
{
    public function getStatus()
    {
        $phones = Phones::get();

        return new JsonResponse(['status' => $phones]);
    }
}


