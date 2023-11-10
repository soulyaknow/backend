<?php

namespace App\Models;

use App\Models\KlassSection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'time',
        'day'
    ];


    public function klassSection():BelongsTo
    {
        return $this->belongsTo(KlassSection::class);
    }

}
