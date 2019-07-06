<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Validator;

class PassportController extends Controller
{
    public $successStatus = 200;
    
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
           $user = Auth::user();
           $success['token'] = $user->createToken('MyApp')->accessToken;
           return response()->json(['success'=>$success],$this->successStatus);
        }
        else {
            return response()->json(['error'=>'Unauthorized'],401);
        }
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'c_password' => 'required|min:6|same:password',
        ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()],401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        return response()->json(['success'=>$success],$this->successStatus);
        
    }
    public function getDetails() {
        $user = Auth::user();
        return response()->json(['success'=>$user],$this->successStatus);
    }
}
