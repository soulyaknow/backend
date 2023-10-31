<?php

namespace App\Models;

use App\Models\User;
use App\Models\Evaluatee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $hidden = ['pivot'];


    public function evaluatees()
    {
        return $this->morphedByMany(Evaluatee::class,'roleable')->withTimestamps();
    }


    public function users()
    {
        return $this->morphedByMany(User::class,'roleable')->withTimestamps();
    }
}
