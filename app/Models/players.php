<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class players extends Model
{
    use HasFactory;
    protected $primaryKey = 'playerID'; // Als de primaire sleutel een andere naam heeft dan 'id'

    protected $fillable = [
        'playerID',
        'teamID',
        'userID',
        'reserveplayer',
        'teamleader',
        'goals',
    ];

    // Relaties met de 'teams' en 'users' tabellen
    public function team()
    {
        return $this->belongsTo(Teams::class, 'teamID', 'TeamID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}
