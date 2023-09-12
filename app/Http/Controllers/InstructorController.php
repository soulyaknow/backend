<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Instructor;
use App\Models\Question;
use App\Models\Questionaire;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Builder;
class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $questionaire = Questionaire::where('id', $id)
        //                             ->with('instructors')
        //                             ->first();
        $instructors = Instructor::all();
        return view('instructors.index',compact('instructors'));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $instructor = Instructor::findorFail($id);
        $questionaire = Questionaire::with([
                                        'criterias' => function($query)use($id){
                                            $query->with([
                                                'questions'=> function($q)use($id){
                                                    $q->withCount([
                                                        'ratings as NI'=> function($q)use($id){
                                                            $q->CountRatingsBySubject($id,1);
                                                        },
                                                        'ratings as F'=> function($q)use($id){
                                                            $q->CountRatingsBySubject($id,2);
                                                        },
                                                        'ratings as S'=> function($q)use($id){
                                                            $q->CountRatingsBySubject($id,3);
                                                        },
                                                        'ratings as VS'=> function($q)use($id){
                                                            $q->CountRatingsBySubject($id,4);
                                                        },
                                                        'ratings as O'=> function($q)use($id){
                                                            $q->CountRatingsBySubject($id,5);
                                                        },
                                                    ]);
                                                }
                                            ]);
                                        }
                                        ])
                                        ->first();
                                        
        //  $questionaire[0]->criterias[0]->questions->with('ratings');    
        // dd($questionaire[0]->criterias[0]->questions[0]);
        // // dd( $questionaire[0]->criterias[0]->questions[0]->ratings->count());
        // $questionaire = Questionaire::with([
        //                                 'criterias' => function($query)use($id){
        //                                     $query->with(['questions']);
        //                                     }
        //                                 ])
        //                                 ->get();
        // $questionaire = Questionaire::questionaireWithCriteria(1)->first();
        // $questions = $questionaire
        // $ratings = $questionaire[0]->criterias[0]->questions[0]
                                    // ->withCount([
                                    //     'ratings' => function($query)use($id){
                                    //         $query->whereHasMorph(
                                    //             'ratingable',
                                    //             Instructor::class,
                                    //             function(Builder $q)use($id){
                                    //                 $q->where('ratingable_id',$id)
                                    //                     ->where('rating',1);
                                    //             });
                                    //     }
                                    // ])->get()
                                    ;
        // dd($ratings);
        // $criterias =  $questionaire->criterias()
        //                             ->with([
        //                                 'questions'
        //                                 =>function($q){
        //                                     $q->where('id',1)->first();
        //                                 }
        //                                 ,
        //                                 'questions.ratings' =>function($query)use($id){
        //                                     $query->whereHasMorph(
        //                                         'ratingable',
        //                                         Instructor::class,
        //                                         function(Builder $q)use($id){
        //                                             $q->where('ratingable_id',$id)
        //                                                 ->where('rating',1);
        //                                         });
        //                                 }
        //                             ])
        //                             ->where('id',1)
        //                            ->get()
        //                         ;
            // $questions = array(
            //     'test1'=>'test1',
            //     'test2'=>'test2',
            // );
            // $questions = Question::with([
            //                             'ratings'=>function($query)use($id){
            //                                 $query->whereHasMorph(
            //                                     'ratingable',
            //                                     Instructor::class,
            //                                     function(Builder $q)use($id){
            //                                         $q->where('ratingable_id',$id)
            //                                             ->where('rating',5);
            //                                     })->count();
            //                             }
            //                             ])->where('id',1)->first();
            // dd($questions->ratings->count());
        return view('instructors.show',compact(['questionaire','instructor']));
      
    }

}
