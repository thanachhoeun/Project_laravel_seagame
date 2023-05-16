<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Zone extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'stadium',
    ];
    public function ticket():HasMany{
        return $this->hasMany(Ticket::class);
    }
}
