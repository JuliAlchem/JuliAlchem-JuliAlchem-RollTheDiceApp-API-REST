<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Game extends Model
{
    use HasFactory;
    
    protected $table = 'games';
    protected $fillable = [
        
        'die1',
        'die2',
        'result',
    ];

    // 1:many
    public function user(){
        
        return $this->belongsTo(User::class);
    }
}
