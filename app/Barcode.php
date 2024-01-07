<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    protected $fillable = [
        'code',
        'employee_pseudo',
        'printer_name',
    ];
}