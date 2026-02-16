<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
   use  HasFactory;
   protected $table = 'subscriptions';

    protected $fillable = [
        'level',
        'cost',
        'expires_at',
    ];

    protected $casts = [
        'cost' => 'decimal:2',
    ];
     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
