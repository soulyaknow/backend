<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with(['roles','userInfo','departments'])->get();
        return  UserResource::collection($users);
    }

    public function getUser()
    {
        $user = User::with([
                        'departments',
                        'roles',
                        'userInfo',
                        'sectionYears'
                            => function($query){
                            $query->with([
                                'klasses'
                                => function($q){
                                    $q->with(['subject','evaluatee']);
                                }
                            ]);
                        }
                    ])
                    ->findOrFail(auth()->user()->id_number);

        // return response()->json($user);
        return new UserResource($user);

    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
