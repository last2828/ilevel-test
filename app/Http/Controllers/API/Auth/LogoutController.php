<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  /**
   * @OA\POST(
   *     path="/api/users/logout",
   *     summary="Logout user",
   *     tags={"Users"},
   *     description="Logout user",
   *      @OA\Parameter(
   *         name="token",
   *         required=true,
   *         in="header",
   *         description="Bearer lbsiiejroiehfuwoefnelfiower2432420agfasdfsadfasdgrewgwergwergwergewrg",
   *          @OA\Schema(
   *         type="string"
   *          )
   *      ),
   *
   *     @OA\Response(
   *          response=204,
   *          description="Successful operation",
   *       ),
   *      @OA\Response(
   *          response=401,
   *          description="Unauthenticated",
   *      ),
   *      @OA\Response(
   *          response=403,
   *          description="Forbidden"
   *      )
   *
   * )
   */
  public function logout(Request $request)
  {
    $request->user()->token()->revoke();

    return response()->json([
      'message' => 'logout successful',
    ], 200);
  }
}
