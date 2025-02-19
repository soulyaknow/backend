<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KlassSection extends Model
{
    use HasFactory;

    public function schedule():HasOne
    {
        return $this->hasOne(Schedule::class);
    }
}
