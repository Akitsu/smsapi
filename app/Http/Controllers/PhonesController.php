<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Phones as Phones;

class PhonesController extends BaseController
{
    public function getPhones()
    {
        $phones = Phones::get();

        return new JsonResponse(['phones' => $phones]);
    }
}


