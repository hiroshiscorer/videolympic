<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evento extends Model
{
    use HasFactory;

    public function Atleta(): BelongsTo
    {
        return $this->BelongsTo(Atleta::class, 'atleta_id');
    }

    public function Juego(): BelongsTo
    {
        return $this->BelongsTo(Juego::class, 'juego_id');
    }
}
