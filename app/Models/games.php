<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class games extends Model
{
    use HasFactory;

    protected $primaryKey = 'gameID'; // Als de primaire sleutel een andere naam heeft dan 'id'

    protected $fillable = [
        'gameID',
        'team1ID',
        'team2ID',
        'date',
        'scoreTeam1',
        'scoreTeam2',
    ];

    // Relaties met de 'teams' tabel voor team1 en team2
    public function team1()
    {
        return $this->belongsTo(Teams::class, 'team1ID', 'TeamID');
    }

    public function team2()
    {
        return $this->belongsTo(Teams::class, 'team2ID', 'TeamID');
    }
}
