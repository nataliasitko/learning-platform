<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function tag()
    {
        return $this->hasMany('App\Model\Tag');
    }

    public function term()
    {
        return $this->hasMany('App\Model\Terms');
    }
}
