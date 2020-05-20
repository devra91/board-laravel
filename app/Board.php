<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = [
        'sTitle',
        'sContext',
        'nUserID',
        // 'image',
    ];

    
}
