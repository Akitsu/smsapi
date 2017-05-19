<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    public $timestamps = false;
    protected $table = 'inbox';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Class',
        'Coding',
        'ID',
        'Processed',
        'ReceivingDateTime',
        'RecipientID',
        'SenderNumber',
        'SMSCNumber',
        'Text',
        'TextDecoded',
        'UDH',
        'UpdatedInDB',
    ];
}
