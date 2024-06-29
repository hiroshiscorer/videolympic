<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;
    public static function getTypeList() {
        return [
            "intAsc",
            "signedIntAsc",
            "floatAsc",
            "timeAsc",
            "intDesc",
            "signedIntDesc",
            "floatDesc",
            "timeDesc",
        ];
    }

    /**
     * @param $id 'JUEGO Model ID'
     * @return bool
     * Determines if sorting is of type TIME
     */
    public static function isTimeType($id): bool
    {
        $type = Juego::find($id)->sorting;
        return ($type  == "timeDesc" || $type  == "timeAsc");
    }
}
