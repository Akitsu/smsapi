<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Inbox as Inbox;

class InboxController extends BaseController
{
    public function getAllMessages()
    {
        $texts = Inbox::get();

        return new JsonResponse(['texts' => $texts]);
    }

    public function getMessagesByNumber(Request $request) {
        return new JsonResponse(DB::select('SELECT * FROM `inbox` WHERE `SenderNumber` = ' . $request->input('number')));
    }

    public function getMessagesById(Request $request) {
        return new JsonResponse(Inbox::find($request->input('id')));
    }

    public function getMessagesByTerm(Request $request) {
        return new JsonResponse(DB::select('SELECT * FROM `inbox` LIKE `TextDecoded` = %' . $request->input('number') . '%'));
    }

    public function sendMessage(Request $request) {
        return new JsonResponse(Inbox::find($request->input('words')));
    }
}


