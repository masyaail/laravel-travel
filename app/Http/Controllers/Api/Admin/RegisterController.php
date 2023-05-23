<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           //set validation
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        

        //if validation fail
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //creat a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        

        return response()->json([
            'success' => true,
            'message' => 'Register Successfully!',
            'user'    => $user,
            'token'   => $user->createToken('authToken')->accessToken    
        ], 200);
    }
}
