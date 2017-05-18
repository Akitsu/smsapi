<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Inbox as Inbox;
use App\Outbox as Outbox;

class MessageController extends BaseController
{
    public function getAllMessages()
    {
        $texts = Inbox::get();

        return new JsonResponse(['texts' => $texts]);
    }

    public function getMessagesByNumber(Request $request) {
        return new JsonResponse(Inbox::where('SenderNumber', '=', $request->input('number'))->get());
    }

    public function getMessagesById(Request $request) {
        return new JsonResponse(Inbox::find($request->input('id')));
    }

    public function getMessagesByTerm(Request $request) {
        return new JsonResponse(Inbox::where('TextDecoded', 'LIKE', '%' . $request->input('term') . "%")->get());
    }

    public function sendMessage(Request $request) {
        $outbox = new Outbox();
        $outbox->DestinationNumber = $request->input('number');
        $outbox->TextDecoded = $request->input('message');
        if ($request->has('datetime')) {
            $outbox->SendingDateTime = $request->input('datetime');
        }
        $outbox->DeliveryReport = "yes";

        return new JsonResponse($outbox->save());
    }

    public function deleteMessage (Request $request) {
        $message = Inbox::where('ID', $request->input('id'))
            ->delete();

        return new JsonResponse($message);
    }

    public function markAsRead (Request $request) {
        $message = Inbox::where('ID', $request->input('id'))
            ->update(['Processed' => 'true']);

        return new JsonResponse($message);
    }

    public function markAsUnread (Request $request) {
        $message = Inbox::where('ID', $request->input('id'))
            ->update(['Processed' => 'false']);

        return new JsonResponse($message);
    }
}


