<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Login user request",
 *      description="Login Userrequest body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class LoginUserRequest
{
  /**
   * @OA\Property(
   *      title="Email",
   *      description="User email",
   *      example="John@example.com"
   * )
   *
   * @var string
   */
  public $email;

  /**
   * @OA\Property(
   *      title="password",
   *      description="User password",
   *      example="mypassword1"
   * )
   *
   * @var string
   */
  private $password;
}
