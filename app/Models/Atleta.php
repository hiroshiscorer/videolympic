<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Atleta extends Model
{
    use HasFactory;

    public function Juego(): BelongsTo
    {
        return $this->BelongsTo(Juego::class, 'juego_id');
    }
}
