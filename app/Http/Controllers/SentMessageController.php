<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Sentitems as Sentitems;

class SentMessageController extends BaseController
{
    public function getSentMessages()
    {
        return new JsonResponse(['messages' => Sentitems::get()]);
    }
}


