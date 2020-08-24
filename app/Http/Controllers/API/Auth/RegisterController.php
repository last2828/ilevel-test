<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function register(Request $request)
  {
    $data = $request->all();
    $rules = [
      'name' => 'required|string|max:255',
      'email' => 'required|string|unique:users|email|max:255',
      'password' => 'required|string|min:6|confirmed'
    ];

    $validator = Validator::make($data, $rules);

    if($validator->fails())
    {
      return response()->json([
        'error' => $validator->errors()
      ], 400);
    }

    $data['password'] = bcrypt($data['password']);

    $user = User::create($data);

    return response()->json([
      'message' => 'register successful',
      'user' => $user
    ], 200);


  }
}
