<?php

namespace App\Models;

use App\Models\Criteria;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['question'];

    public function criteria(): BelongsTo
    {
        return $this->belongsTo(Criteria::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function scopeCountRatingsBySubject(Builder $query,$id,$rating)
    {
        $query->withCount([
                'ratings' => function($query)use($id,$rating){
                    $query->whereHasMorph(
                            'ratingable',
                            Instructor::class,
                            function(Builder $q)use($id,$rating){
                                $q->where('ratingable_id',$id)
                                    ->where('rating',$rating);
                            });
                }
            ]);
    }
}
