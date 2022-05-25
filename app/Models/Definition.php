<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Definition extends Model
{
    use HasFactory;

    protected $fillable = [
        'definition',
    ];

    public function term()
    {
        return $this->hasOne('App\Model\Term');
    }
}
