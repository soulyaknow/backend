<?php

namespace App\Http\Controllers;

// use App\Models\Criteria;

use App\Models\User;
use App\Models\Rating;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Evaluatee;
use App\Models\Instructor;
use App\Models\Questionaire;
// use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use PhpParser\Node\Expr\Eval_;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $instructor = 1;

        // $question = 1;
        // $instructor = Instructor::withCount(['ratings as NI_count'=> function(Builder $q)use($question){
        //                                 $q->where('question_id', $question)->where('rating', 1);
        //                             },
        //                             'ratings as F_count'=> function(Builder $q)use($question ){
        //                                 $q->where('question_id', $question)->where('rating',2);
        //                             },
        //                             'ratings as S_count'=> function(Builder $q)use($question ){
        //                                 $q->where('question_id', $question)->where('rating',3);
        //                             },
        //                             'ratings as VS_count'=> function(Builder $q)use($question ){
        //                                 $q->where('question_id', $question)->where('rating',4);
        //                             },'ratings as O_count'=> function(Builder $q)use($question ){
        //                                 $q->where('question_id', $question)->where('rating',5);
        //                             },
        //                         ])
        //                         ->where('id', $instructor)
        //                         ->get(['id','name']);
        // return response()->json($instructor);
        // $rating = Rating::with('question')
        // return response()->json($rating );
        //                     ->get();
        // withCount(['ratings'=> function(Builder $query){
        //     $query->whereHas('ratingable',function($q){
        //             $q->whereKey($ins);
        //         });
        //      }])
            // $rating = Rating::whereHasMorph(
            //                         'ratingable',
            //                         Instructor::class,
            //                         function(Builder $query){
            //                             $query->where('ratingable_id',1)
            //                                   ->where('question_id',1);
            //                         }
            //                       )
                                //   ->withCount(['ratings'=>function( $q){
                                //     $q->where('rating',1);
                                // }])

            //                       ->get();
            // return response()->json($rating);
            // $questions = Question::withCount(['ratings as NI_counts'=>function($query){
                                            // $query->whereHasMorph(
                                            //     'ratingable',
                                            //     Instructor::class,
                                            //     function(Builder $q){
                                            //         $q->where('ratingable_id',1)
                                            //             ->where('rating',1);
                                            //     });
            //                             },
            //                             'ratings as F_counts'=>function($query){
            //                                 $query->whereHasMorph(
            //                                     'ratingable',
            //                                     Instructor::class,
            //                                     function(Builder $q){
            //                                         $q->where('ratingable_id',1)
            //                                             ->where('rating',2);
            //                                     });
            //                             },
            //                             'ratings as S_count'=>function($query){
            //                                 $query->whereHasMorph(
            //                                     'ratingable',
            //                                     Instructor::class,
            //                                     function(Builder $q){
            //                                         $q->where('ratingable_id',1)
            //                                             ->where('rating',3);
            //                                     });
            //                             },
            //                             'ratings as VS_count'=>function($query){
            //                                 $query->whereHasMorph(
            //                                     'ratingable',
            //                                     Instructor::class,
            //                                     function(Builder $q){
            //                                         $q->where('ratingable_id',1)
            //                                             ->where('rating',4);
            //                                     });
            //                             },
            //                             'ratings as O_count'=>function($query){
            //                                 $query->whereHasMorph(
            //                                     'ratingable',
            //                                     Instructor::class,
            //                                     function(Builder $q){
            //                                         $q->where('ratingable_id',1)
            //                                             ->where('rating',5);
            //                                     });
            //                             },
            //                         ])
            //                         ->with('criteria')
            //                         // ->where('criteria_id',1)
            //                         // ->where('id',1)
            //                         ->get();
            // return response()->json($questions);
            $id = 1;
            $questionaire = Questionaire::find(1);
            $questions =  $questionaire->criterias()
                                        ->with([
                                            'questions'
                                             =>function($q){
                                                $q->where('id',1);
                                            }
                                            ,
                                            'questions.ratings' =>function($query)use($id){
                                                $query->whereHasMorph(
                                                    'ratingable',
                                                    Instructor::class,
                                                    function(Builder $q)use($id){
                                                        $q->where('ratingable_id',$id)
                                                            ->where('rating',1);
                                                    });
                                            }
                                        ])
                                     ->where('id',1)
                                       ->get();
                                         return response()->json($questions);

    }
    public function test()
    {
        return view('index');
    }

    public function testModel()
    {
        // <<--- this query for evaluatee to subject
    //    $test = Evaluatee::with('subjects')->where('id',1)->get();
    //    ---->>
        // <--- this query for subject to evaluatee
        // $test = Subject::with('evaluatees')->where('id',1)->get();
        // --->>

        $test =  User::with([
                    'userInfo',
                    'sectionYears'
                     => function($query){
                        $query->with([
                            'klasses'
                            => function($q){
                                $q->with('subject');
                            }
                        ]);
                    }
                ])->find(10074);

        // $test = Evaluatee::with([
        //                     'klasses' => function($query){
        //                         $query->with('subject')
        //                             ->with(['sectionYears'=>function($q){
        //                                     $q->with('users');
        //                             }])
        //                              ->where('subject_id',5)
        //                              ->get();
        //                     }
        //                     ])
        //                     ->find(1);
       return response()->json($test);
    }
}
