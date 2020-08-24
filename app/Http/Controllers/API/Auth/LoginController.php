<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');

    if(!Auth::attempt($credentials))
    {
      return response()->json([
        'message' => 'bad credentials, unauthorised'
      ], 401);
    }

    $token = Auth::user()->createToken(config('authToken'));

    return response()->json([
      'token_type' => 'Bearer',
      'token' => $token->accessToken,
      'user' => Auth::user()
    ], 200);

  }
}
