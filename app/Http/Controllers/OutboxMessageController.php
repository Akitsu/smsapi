<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Outbox as Outbox;

class OutboxMessageController extends BaseController
{
    public function getAllOutboxMessages()
    {
        return new JsonResponse(Outbox::get());
    }

    public function getOutboxMessagesByNumber(Request $request) {
        return new JsonResponse(Outbox::where('DestinationNumber', '=', $request->input('number'))->get());
    }

    public function getOutboxMessagesById(Request $request) {
        return new JsonResponse(Outbox::where('ID', '=', $request->input('id'))->get());
    }

    public function getOutboxMessagesByTerm(Request $request) {
        return new JsonResponse(Outbox::where('TextDecoded', 'LIKE', '%' . $request->input('term') . "%")->get());
    }

    public function deleteOutboxMessage (Request $request) {
        $message = Outbox::where('ID', $request->input('id'))
            ->delete();

        return new JsonResponse($message);
    }

    public function updateOutboxMessageDate (Request $request) {
        $message = Outbox::where('ID', $request->input('id'))
            ->update(['SendingDateTime' => $request->input('datetime')]);

        return new JsonResponse($message);
    }

    public function updateOutboxMessageText (Request $request) {
        $message = Outbox::where('ID', $request->input('id'))
            ->update(['TextDecoded' => $request->input('message')]);

        return new JsonResponse($message);
    }
}


