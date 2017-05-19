<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SentItems extends Model
{
    public $timestamps = false;
    protected $table = 'sentitems';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'UpdatedInDB',
        'InsertIntoDB',
        'SendingDateTime',
        'DeliveryDateTime',
        'Text',
        'DestinationNumber',
        'Coding',
        'UDH',
        'SMSCNumber',
        'Class',
        'TextDecoded',
        'ID',
        'SenderID',
        'SequencePosition',
        'Status',
        'StatusError',
        'TPMR',
        'RelativeValidity',
        'CreatorID',
    ];
}