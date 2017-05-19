<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\SentItems as SentItems;

class SentMessageController extends BaseController
{
    public function getSentMessages()
    {
        return new JsonResponse(Sentitems::get());
    }

    public function getSentMessagesByNumber(Request $request) {
        return new JsonResponse(SentItems::where('DestinationNumber', '=', $request->input('number'))->get());
    }

    public function getSentMessagesById(Request $request) {
        return new JsonResponse(SentItems::where('ID', '=', $request->input('id'))->get());
    }

    public function getSentMessagesByTerm(Request $request) {
        return new JsonResponse(SentItems::where('TextDecoded', 'LIKE', '%' . $request->input('term') . "%")->get());
    }

    public function deleteSentMessage (Request $request) {
        $sentMessage = SentItems::where('ID', $request->input('id'))
            ->delete();

        return new JsonResponse($sentMessage);
    }
}


