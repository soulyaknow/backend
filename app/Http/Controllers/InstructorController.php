<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Evaluatee;
use App\Models\Instructor;
use App\Models\Question;
use App\Models\Questionaire;
use App\Models\Rating;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showForm(Request $request,$instructor_id,$qId)
    {
        // $rating = Rating::with('user')
        //                 ->where('question_id',1)
        //                 ->whereHasMorph(
        //                     'ratingable',
        //                     Instructor::class,
        //                     function(Builder $q)use($instructor_id){
        //                         $q->where('ratingable_id',$instructor_id)
        //                             ;
        //                     })->where('rating',$request->rating)
        //                 ->get();
        // dd($rating);
        // $users = User::with([
        //     'ratings'=> function($query)use($request,$instructor_id){
        //         $query
        //             // ->with('user')
        //               ->ratingsBySubject($instructor_id,$request->rating)
        //         ;
        //     }
        // ])->get();
        // $users = User::with(
        //     'ratings')->get();
        // dd($users[0]);
        $instructor = Evaluatee::where('id',$instructor_id)
                                  ->select(['id','name'])
                                  ->first();
        // dd( $instructor);
        // $criteria = Criteria::with([
        //                                 'questionaire' =>function($query){
        //                                     $query->wherePivot('questionaire_id',1);
        //                                 }
        //                             ])
        //                             ->where('id',1)
        //                             ->first();
        // dd( $criteria->questionaire);
        $question = Question::with(['criteria' =>function($query)use($request){
                                            $query->with([
                                                'questionaire' => function($query) use($request){
                                                    $query->wherePivot('questionaire_id',$request->questionaire_id)
                                                        ->select(['title','description']);
                                                }
                                            ])->select(['id','description']);
                                        }
                                    ])
                                ->with([
                                        'ratings'=> function($query)use($request,$instructor_id){
                                            $query->with([
                                                    'user' => function($query){
                                                        $query->select(['id_number','name']);
                                                    }
                                                ])
                                                ->ratingsBySubject($instructor_id,$request->rating)
                                            ;
                                        }
                                ])
                                ->where('id',$qId)
                                ->select(['id','question','criteria_id'])
                                ->first();
        return view('evaluation-form',compact(['question','instructor']));
    }
    public function index()
    {
        // $questionaire = Questionaire::where('id', $id)
        //                             ->with('instructors')
        //                             ->first();
        // $instructors = Evaluatee::with('roles')->get();
        // $instructors = Evaluatee::with(['roles' => function($query){
        //                             $query->where('name','guard');
        //                                 }])->get();
        $instructors = Role::with('evaluatees')->where('name','instructor')->first();
        return view('instructors.index',compact('instructors'));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $instructor = Evaluatee::where('id',$id)->first();

        $questionaire = $instructor->questionaires()->evaluationFormFor($id)->where('id',$id)->first();
        // dd($q);
        // $questionaire = Questionaire::evaluationFormFor($id)->first();
        // $questionaire =  $q->with('criterias')->get();
        // dd($questionaire );
        // return view('instructors.show',compact(['questionaire','instructor']));
        return view('instructors.show',compact(['questionaire','instructor']));

    }

}
