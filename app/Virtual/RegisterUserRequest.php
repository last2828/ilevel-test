<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Register user request",
 *      description="Register user request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class RegisterUserRequest
{
  /**
   * @OA\Property(
   *      title="Name",
   *      description="User name",
   *      example="John"
   * )
   *
   * @var string
   */
  public $name;

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

  /**
   * @OA\Property(
   *      title="password_confirmation",
   *      description="User password",
   *      example="mypassword1"
   * )
   *
   * @var string
   */
  private $password_confirmation;
}
