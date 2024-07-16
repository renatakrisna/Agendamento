<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoordinatorHours extends Model
{
    use HasFactory;

    protected $fillable = [
        'coordinator_id',
        'start_time',
        'end_time',
    ];

    // Relação com o usuário (coordenador)
    public function coordinator()
    {
        return $this->belongsTo(User::class, 'coordinator_id');
    }
}
