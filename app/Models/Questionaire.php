<?php

namespace App\Models;

use App\Models\Criteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
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

    public function scopeQuestionaireWithCriteria(Builder $query, $id= null)
    {
        if(!$id){
            return $query->with('criterias');
        }
        return $query->with('criterias')->where('id', 1);
    }

    public function getNIAttribute()
    {
        return $this->ratings;
    }
    public function getAliasedRatingsAttribute()
    {
        return $this->ratings;
    }
}
