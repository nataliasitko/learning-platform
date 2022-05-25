<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function sets()
    {
        return $this->belongsTo('App\Model\Sets');
    }

    public function term()
    {
        return $this->hasOne('App\Model\Definition');
    }
}
