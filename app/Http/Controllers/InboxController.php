<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Inbox as Inbox;

class InboxController extends BaseController
{
    public function getInbox()
    {
        $texts = Inbox::get();

        return new JsonResponse(['texts' => $texts]);
    }
}


