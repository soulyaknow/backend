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
        $questionaire = Questionaire::find(1);
        $questions =  $questionaire->criterias()
                                   ->with('questions.ratings')
                                   
                                   ->get();
        // $questions = Criteria::with([
        //                             'questions.ratings' =>function($query){
        //                                $query->where('questions_id',1)->count(); 
                                       
        //                             }
        //                             ])->get();
        dd($questions);
        return view('instructors.show');
    }

}
