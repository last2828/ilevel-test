<?php

namespace App\Virtual\Models;
/**
 * @OA\Schema(
 *     title="User",
 *     description="User model",
 *     @OA\Xml(
 *         name="User"
 *     )
 * )
 *
 */
class User
{
  /**
   * @OA\Property(
   *     title="ID",
   *     description="ID",
   *     format="int64",
   *     example=1
   * )
   *
   * @var integer
   */
  private $id;

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
   *      title="token type",
   *      description="token type",
   *      example="Bearer"
   * )
   *
   * @var string
   */
  public $token_type;

  /**
   * @OA\Property(
   *      title="token",
   *      description="token",
   *      example="d;sf;sdbg;afaisfghlierjwoierh7492342pkrof34f845y034u34"
   * )
   *
   * @var string
   */
  public $token;


}
