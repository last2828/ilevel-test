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

  /**
   * @OA\POST(
   *     path="/api/users/login",
   *     summary="Login user",
   *     tags={"Users"},
   *     description="Login user",
   *      @OA\RequestBody(
   *          required=true,
   *          @OA\JsonContent(ref="#/components/schemas/LoginUserRequest")
   *      ),
   *
   *     @OA\Response(
   *          response=200,
   *          description="Successful operation",
   *          @OA\JsonContent(ref="#/components/schemas/User"),
   *       ),
   *      @OA\Response(
   *          response=400,
   *          description="Bad Request"
   *      ),
   *      @OA\Response(
   *          response=403,
   *          description="Forbidden"
   *      )
   *
   * )
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
