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

  /**
   * @OA\Post(
   *     path="/api/users/register",
   *     summary="Register a new user",
   *     tags={"Users"},
   *     description="Register a new user",
   *      @OA\RequestBody(
   *          required=true,
   *          @OA\JsonContent(ref="#/components/schemas/RegisterUserRequest")
   *      ),
   *
   *     @OA\Response(
   *          response=201,
   *          description="Successful operation"
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
