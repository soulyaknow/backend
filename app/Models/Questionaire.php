<?php

namespace App\Models;

use App\Models\Criteria;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

// use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Questionaire extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'title',
        'description'
    ];

    public function criterias(): BelongsToMany
    {
        return $this->belongsToMany(Criteria::class,'criteria_questionaire')->withTimestamps();
    }
    
    public function instructors()
    {
        return $this->morphedByMany(Instructor::class,'evaluatable')->withTimestamps();
    }

}
