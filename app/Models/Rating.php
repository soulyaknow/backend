<?php

namespace App\Models;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Rating extends Model
{
    use HasFactory;

    
    protected $fillable = ['ratings'];
    public function ratingable(): MorphTo
    {
        return $this->morphTo();
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'evaluator_id','id_number');
    
    }

    public function scopeQuestionRatingCount(Builder $query,$id,$rating)
    {
        // return $query->whereHasMorph('ratingable',Instructor::class, function(Builder $q)use($rating){
        //     $q->where('rating', $rating);
        // })->get();
        // return $query->withCount(['rating' => function($q)use($rating){
        //     $q->where('rating', $rating)->get();
        // }]);
        return $query->where('question_id',$id)
                     ->where('rating',$rating)->count();
    }
    // private function scopeSearchUser()
    // {
    //     return $this->where();
    // }
    // public function scopeQuestionRatingCountBySubject(Builder $query)
    // {

    // }
    public function scopeRatingsBySubject(Builder $query,$instructor_id,$rating)
    {
        $query->whereHasMorph(
            'ratingable',
            Instructor::class,
            function(Builder $q)use($instructor_id,$rating){
                $q->where('ratingable_id',$instructor_id)
                    ->where('rating',$rating);
            });
    }
}
