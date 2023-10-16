<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        // $user = User::where('email', $request->email)->first();

        // if (!$user || !Hash::check($request->password, $user->password)) {
        //     throw ValidationException::withMessages([
        //         'email' => ['The credentials you entered are incorrect.']
        //     ]);
        // }
        if (!auth()->attempt($request->only(['id_number', 'password']))) {
            throw ValidationException::withMessages([
                'id_number' => ['The credentials you entered are incorrect.']
            ]);
        }


    }
}
