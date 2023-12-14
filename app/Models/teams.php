<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teams extends Model
{
    protected $primaryKey = 'TeamID'; // Als de primaire sleutel een andere naam heeft dan 'id'

    protected $fillable = [
        'TeamID',
        'Teamnaam',
        'teamleaderID',
        'points',
        'image',
    ];

    // Relatie met de 'users' tabel voor de teamleider
    public function teamLeader()
    {
        return $this->belongsTo(User::class, 'teamleaderID', 'userID');
    }
    
    use HasFactory;
}
