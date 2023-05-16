<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'description',
        'user_id',
        'teams',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'event_teams')->withTimestamps();
    }

    public static function store($request, $id = null){
        // dd(request('teams'));
        $team = $request->only(['name','start_date','end_date','description','user_id']);
        $team = self::updateOrCreate(['id' => $id], $team);
       
        $teams = request('teams');
        $team->teams()->sync($teams);

        return $team;
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function ticket():HasMany{
        return $this->hasMany(Ticket::class);
    }
}
