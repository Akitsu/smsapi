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
        return new JsonResponse(DB::select('SELECT * FROM `inbox` WHERE `SenderNumber` = ' . $request->input('number')));
    }

    public function getMessagesById(Request $request) {
        return new JsonResponse(Inbox::find($request->input('id')));
    }

    public function getMessagesByTerm(Request $request) {
        return new JsonResponse(DB::select("SELECT * FROM `inbox` WHERE `TextDecoded` LIKE '%" . $request->input('term') . "%'"));
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
        $rows = DB::select('SELECT * FROM `inbox` WHERE `ID` = ' . $request->input('id'));

        return new JsonResponse($rows->delete());
    }

    public function markAsRead (Request $request) {
//        $message = DB::select('SELECT * FROM `inbox` WHERE `ID` = ' . $request->input('id'));
        $message = Inbox::find($request->input('id'));
        $message->processed = true;

        var_dump($message);

        return new JsonResponse($message->save());
    }

    public function markAsUnread (Request $request) {
        $message = DB::select('SELECT * FROM `inbox` WHERE `ID` = ' . $request->input('id'));
        $message->processed = false;

        return new JsonResponse($message->save());
    }
}


