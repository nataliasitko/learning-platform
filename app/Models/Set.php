<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, mixed $id)
 */
/**
 * @method static create(array $array)
 */
class Set extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'note',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'user_id' => 'int',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tag(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    public function term(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Term::class);
    }
}
