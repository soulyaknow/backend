<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\Evaluatee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EvaluateeResource;
use App\Http\Resources\UserResource;

class EvaluateeController extends Controller
{



    public function index()
    {
        $evaluatees = Evaluatee::with(['departments','roles'])->get();
        return  EvaluateeResource::collection($evaluatees);

    }

    public function evaluated(Request $request)
    {
        $evaluateed = User::with(['evaluatees' => function($query){
                        $query->with(['departments','roles']);
                    }])->findOrFail($request->user_id);
        return  new UserResource($evaluateed);

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
