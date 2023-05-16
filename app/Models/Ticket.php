<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'user_id',
        'event_id',
        'date',
        'price',
        'zone',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function event():BelongsTo{
        return $this->belongsTo(Event::class);
    }
    public function zone():BelongsTo{
        return $this->belongsTo(Zone::class);
    }

}
