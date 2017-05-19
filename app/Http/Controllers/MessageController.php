<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Inbox as Inbox;
use App\Outbox as Outbox;
use App\Outboxmp as Outboxmp;

class MessageController extends BaseController
{
    public function getAllMessages()
    {
        return new JsonResponse(Inbox::get());
    }

    public function getMessagesByNumber(Request $request) {
        return new JsonResponse(Inbox::where('SenderNumber', '=', $request->input('number'))->get());
    }

    public function getMessagesById(Request $request) {
        return new JsonResponse(Inbox::where('ID', '=', $request->input('id'))->get());
    }

    public function getMessagesByTerm(Request $request) {
        return new JsonResponse(Inbox::where('TextDecoded', 'LIKE', '%' . $request->input('term') . "%")->get());
    }

    public function sendMessage(Request $request) {

        $msg = str_split($request->input('message'), 160);

        if (count($msg) > 1) {
            $outboxID = -1;
            for ($i = 0; $i < count($msg); $i++) {
                if ($i == 0) {
                    $outbox = new Outbox();
                    $outbox->DestinationNumber = $request->input('number');
                    $outbox->TextDecoded = $msg[0];
                    if ($request->has('datetime')) {
                        $outbox->SendingDateTime = $request->input('datetime');
                    }
                    $outbox->Class = 1;
                    $outbox->DeliveryReport = "yes";
                    $outbox->MultiPart = 'true';
                    $save = $outbox->save();
                    if (!$save) return new JsonResponse(false);

                    $outboxID = $outbox->id;

                } else {
                    $outboxmp = new Outboxmp;
                    $outboxmp->TextDecoded = $msg[$i];
                    $outboxmp->SequencePosition = $i + 1;
                    $outboxmp->ID = $outboxID;
                    $outboxmp->Class = 1;

                    $sve = $outboxmp->save();

                    if (!$sve) return new JsonResponse(false);
                    if ($i == count($msg) - 1) return new JsonResponse(true);
                }
            }

        } else {
            $outbox = new Outbox();
            $outbox->DestinationNumber = $request->input('number');
            $outbox->TextDecoded = $request->input('message');
            if ($request->has('datetime')) {
                $outbox->SendingDateTime = $request->input('datetime');
            }
            $outbox->DeliveryReport = "yes";

            return new JsonResponse($outbox->save());
        }

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


