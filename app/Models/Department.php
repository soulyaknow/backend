<?php

namespace App\Models;

use App\Models\User;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['department'];

    public function users()
    {
      return $this->morphedByMany(User::class, 'departmentables')->withTimestamps();;
    }

    public function instructors()
    {
        return $this->morphedByMany(Instructor::class,'departmentables')->withTimestamps();
    }
}
