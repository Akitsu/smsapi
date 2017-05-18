<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outboxmp extends Model
{
    public $timestamps = false;
    protected $table = 'outbox_multipart';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Text',
        'Coding',
        'UDH',
        'Class',
        'TextDecoded',
        'ID',
        'SequencePosition',

    ];
}