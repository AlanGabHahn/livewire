<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'user_id'];

    /**
     * Get the user that owns the Tweet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class)
                        ->where( function ($query) {
                            if (auth()->check()) {
                                $query->where('user_id', auth()->user()->id);
                            }
                        });
    }

}
