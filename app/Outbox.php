<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
    public $timestamps = false;
    protected $table = 'outbox';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Class',
        'Coding',
        'CreatorID',
        'DeliveryReport',
        'DestinationNumber',
        'ID',
        'InsertIntoDB',
        'MultiPart',
        'Priority',
        'RelativeValidity',
        'Retries',
        'SendAfter',
        'SendBefore',
        'SenderID',
        'SendingDateTime',
        'SendingTimeOut',
        'Text',
        'TextDecoded',
        'UDH',
        'UpdatedInDB',
    ];
}