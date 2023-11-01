<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\EvaluateeResource;
use App\Models\Evaluatee;
use Illuminate\Http\Request;

class EvaluateeController extends Controller
{



    public function index(Request $request)
    {
        $evaluatees = Evaluatee::with(['departments','roles'])->get();
        return  EvaluateeResource::collection($evaluatees);

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
