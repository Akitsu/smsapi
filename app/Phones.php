<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phones extends Model
{
    public $timestamps = false;
    protected $table = 'phones';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Battery',
        'Client',
        'ID',
        'IMEI',
        'IMSI',
        'InsertIntoDB',
        'NetCode',
        'Send',
    ];
}